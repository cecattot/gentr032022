<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Dangers Controller
 *
 * @method \App\Model\Entity\Danger[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DangersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $dangers = $this->paginate($this->Dangers);

        $this->set(compact('dangers'));
    }

    /**
     * View method
     *
     * @param string|null $id Danger id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $danger = $this->Dangers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('danger'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $danger = $this->Dangers->newEmptyEntity();
        if ($this->request->is('post')) {
            $danger = $this->Dangers->patchEntity($danger, $this->request->getData());
            if ($this->Dangers->save($danger)) {
                $this->Flash->success(__('The danger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The danger could not be saved. Please, try again.'));
        }
        $roles = $this->Dangers->Roles->find('list');
        $this->set(compact('danger', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Danger id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $danger = $this->Dangers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $danger = $this->Dangers->patchEntity($danger, $this->request->getData());
            if ($this->Dangers->save($danger)) {
                $this->Flash->success(__('The danger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The danger could not be saved. Please, try again.'));
        }
        $roles = $this->Dangers->Roles->find('list');
        $this->set(compact('danger', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Danger id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $danger = $this->Dangers->get($id);
        if ($this->Dangers->delete($danger)) {
            $this->Flash->success(__('The danger has been deleted.'));
        } else {
            $this->Flash->error(__('The danger could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
