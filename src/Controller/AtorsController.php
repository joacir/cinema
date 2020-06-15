<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ators Controller
 *
 * @property \App\Model\Table\AtorsTable $Ators
 * @method \App\Model\Entity\Ator[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AtorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $ators = $this->paginate($this->Ators);

        $this->set(compact('ators'));
    }

    /**
     * View method
     *
     * @param string|null $id Ator id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ator = $this->Ators->get($id, [
            'contain' => ['Filmes'],
        ]);

        $this->set(compact('ator'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ator = $this->Ators->newEmptyEntity();
        if ($this->request->is('post')) {
            $ator = $this->Ators->patchEntity($ator, $this->request->getData());
            if ($this->Ators->save($ator)) {
                $this->Flash->success(__('The ator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ator could not be saved. Please, try again.'));
        }
        $filmes = $this->Ators->Filmes->find('list', ['limit' => 200]);
        $this->set(compact('ator', 'filmes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ator id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ator = $this->Ators->get($id, [
            'contain' => ['Filmes'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ator = $this->Ators->patchEntity($ator, $this->request->getData());
            if ($this->Ators->save($ator)) {
                $this->Flash->success(__('The ator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ator could not be saved. Please, try again.'));
        }
        $filmes = $this->Ators->Filmes->find('list', ['limit' => 200]);
        $this->set(compact('ator', 'filmes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ator id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ator = $this->Ators->get($id);
        if ($this->Ators->delete($ator)) {
            $this->Flash->success(__('The ator has been deleted.'));
        } else {
            $this->Flash->error(__('The ator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
