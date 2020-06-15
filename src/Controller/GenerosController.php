<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Generos Controller
 *
 * @property \App\Model\Table\GenerosTable $Generos
 * @method \App\Model\Entity\Genero[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GenerosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $generos = $this->paginate($this->Generos);

        $this->set(compact('generos'));
    }

    /**
     * View method
     *
     * @param string|null $id Genero id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $genero = $this->Generos->get($id, [
            'contain' => ['Filmes'],
        ]);

        $this->set(compact('genero'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $genero = $this->Generos->newEmptyEntity();
        if ($this->request->is('post')) {
            $genero = $this->Generos->patchEntity($genero, $this->request->getData());
            if ($this->Generos->save($genero)) {
                $this->Flash->success(__('The genero has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The genero could not be saved. Please, try again.'));
        }
        $this->set(compact('genero'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Genero id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $genero = $this->Generos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $genero = $this->Generos->patchEntity($genero, $this->request->getData());
            if ($this->Generos->save($genero)) {
                $this->Flash->success(__('The genero has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The genero could not be saved. Please, try again.'));
        }
        $this->set(compact('genero'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Genero id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $genero = $this->Generos->get($id);
        if ($this->Generos->delete($genero)) {
            $this->Flash->success(__('The genero has been deleted.'));
        } else {
            $this->Flash->error(__('The genero could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
