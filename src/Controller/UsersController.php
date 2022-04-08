<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);
        if ($this->request->is('post')) {
            $this->allowAction($this->request->getData());
        }

        $this->set(compact('users'));
    }

    public function allowAction($form)
    {
        $this->request->getSession()->write('UsersAcaoID', $form['identif']);
        if ($form['acao'] == 'edit') {
            $this->redirect(['controller' => 'users', 'action' => 'edit']);
        } elseif ($form['acao'] == 'view') {
            $this->redirect(['controller' => 'users', 'action' => 'view']);
        } else {
            $this->Flash->error('Acao inexistente');
            return;
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        if ($this->request->is(['post', 'put'])) {
            $this->allowAction($this->request->getData());
        } else {
            $sessao = $this->request->getSession()->read('UsersAcaoID');
            $this->request->getSession()->delete('UsersAcaoID');
            if (empty($sessao)) {
                $this->Flash->error('Você não é bem-vindo aqui');
                $this->redirect(['controller' => 'users', 'action' => 'index']);
            } else {
                $user = $this->Users->get($sessao, [
                    'contain' => [],
                ]);
            }

            $this->set(compact('user'));
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list');
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit()
    {
        $sessao = $this->request->getSession()->read('UsersAcaoID');

        $this->request->getSession()->delete('UsersAcaoID');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $form = $this->request->getData();
            $id = $form['id'];
                $user = $this->Users->get($id, [
                    'contain' => [],
                ]);
                $user = $this->Users->patchEntity($user, $form);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('Ocorreu um erro. Por favor, tente novamente');
                    $this->redirect(['controller' => 'users', 'action' => 'index']);
                }
        }
        if (empty($sessao)) {
            $this->Flash->error('Você não é bem-vindo aqui');
            $this->redirect(['controller' => 'users', 'action' => 'index']);
        } else {
            $user = $this->Users->get(intval($sessao), [
                'contain' => [],
            ]);
            $roles = $this->Users->Roles->find('list');
            $this->set(compact('user', 'roles', 'sessao'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $result = $this->Authentication->getResult();
        // If the user is logged in send them away.
        if ($result->isValid()) {
            $dados = $result->getData();
            $dados['siape'] = md5('Acesso não autorizado.');
            $dados['password'] = md5('Acesso não autorizado.');
            $dados['ativo'] = md5('Acesso não autorizado.');
//            $this->request->getSession()->write('usuario', $dados);
            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid siape or password');
        }
    }

    public function logout()
    {
        $msg = $this->request->getSession()->read('Flash');
        $this->Authentication->logout();
        $this->request->getSession()->destroy();
        $this->request->getSession()->write('Flash', $msg);
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}
