<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $params = $this->request->getAttributes()['params']; // Busca os dados da página.
        if ($params['controller'] != 'Users' or ($params['action'] != 'logout' and $params['action'] != 'login')) {
            $usuario = $this->request->getSession()->read('Auth'); // Busca usuário na sessão.
            if (!empty($usuario)) { // Se existe usuário na sessão, i. e., a variável $usuario é não vazia.
                if (empty($usuario['id'])) {
                    $this->Flash->warning(__('Acesso à página negado. Realize login novamente.'));
                    $this->redirect(['controller' => 'Users', 'action' => 'logout']);
                } else { // Se o usuário já tentou logar.
                    $permissao = $this->checkAuth($usuario); // Verifica as urls permitidas para o usuário.
                    $paginaSolicitada = $params['controller'].'/'.$params['action'];
//                    $idSolicitado = $this->request->getSession()->read('Auth'); // Busca id na sessão edit.
                    if (!in_array($paginaSolicitada, $permissao)){
                        $this->Flash->warning(__('Acesso à página negado. Realize login novamente.'));
                        $this->redirect(['controller' => 'Users', 'action' => 'index']);
                    }
//                    if($paginaSolicitada == "users/edit" OR $paginaSolicitada == "users/view"){
//                        if($idSolicitado != $usuario["id"]){
//                            $this->Flash->warning(__('Acesso à página negado. Realize login novamente.'));
//                            $this->redirect(['controller' => 'Users', 'action' => 'index']);
//                        }
//                    }
                }
            }
            // Obs.: Caso $usuario esteja vazia, então estamos na primeira tentativa de login.
        }
        return true;
    }

    // Método que retorna as informações do usuário logado.
    protected function checkAuth($usuario = null)
    {
        if (empty($usuario)) { // Se não existe informações de autenticação, desloga usuário.
            $this->Flash->error(__('Usuário não está logado.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        $permissao = $this->urlsDanger($usuario['role_id']); // Salva as páginas permitidas.
        $this->request->getSession()->write('permissao', $permissao); // Escreve páginas permitidas na sessão.
        return $permissao;
    }

    // Método que recebe um papel e retorna as urls que o usuário
    // com tal papel tem permissão de acesso.
    private function urlsDanger($papel = null)
    {
        if (empty($papel)) { // Se não existe papel, desloga usuário.
            $this->Flash->error(__('Papel inexistente.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        $this->loadModel('Dangers');  // Carrega a tabela de urls permitidas.
        // Consulta urls permitidas para o papel do usuário:
        $sql = $this->Dangers
            ->find('all', ['conditions' => "Dangers.role_id = $papel"])
            ->toArray();
        $urls[] = ''; // Lista que será retornada, contendo as urls permitidas.
        if (!empty($sql)) {
            $i = 0;
            foreach ($sql as $item) {
                $urls[$i] = $item['acesso'];
                $i++;
            }
        }
        return $urls;
    }
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
}
