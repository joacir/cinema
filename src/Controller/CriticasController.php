<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Criticas Controller
 *
 * @property \App\Model\Table\CriticasTable $Criticas
 * @method \App\Model\Entity\Critica[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CriticasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Filmes'],
        ];
        $criticas = $this->paginate($this->Criticas);

        $this->set(compact('criticas'));
    }

    /**
     * View method
     *
     * @param string|null $id Critica id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $critica = $this->Criticas->get($id, [
            'contain' => ['Filmes'],
        ]);

        $this->set(compact('critica'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $critica = $this->Criticas->newEmptyEntity();
        if ($this->request->is('post')) {
            $critica = $this->Criticas->patchEntity($critica, $this->request->getData());
            if ($this->Criticas->save($critica)) {
                $this->Flash->success(__('The critica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The critica could not be saved. Please, try again.'));
        }
        $filmes = $this->Criticas->Filmes->find('list', ['limit' => 200]);
        $this->set(compact('critica', 'filmes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Critica id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $critica = $this->Criticas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $critica = $this->Criticas->patchEntity($critica, $this->request->getData());
            if ($this->Criticas->save($critica)) {
                $this->Flash->success(__('The critica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The critica could not be saved. Please, try again.'));
        }
        $filmes = $this->Criticas->Filmes->find('list', ['limit' => 200]);
        $this->set(compact('critica', 'filmes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Critica id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $critica = $this->Criticas->get($id);
        if ($this->Criticas->delete($critica)) {
            $this->Flash->success(__('The critica has been deleted.'));
        } else {
            $this->Flash->error(__('The critica could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
