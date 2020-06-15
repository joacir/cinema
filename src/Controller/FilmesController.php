<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Filmes Controller
 *
 * @property \App\Model\Table\FilmesTable $Filmes
 * @method \App\Model\Entity\Filme[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Generos'],
        ];
        $filmes = $this->paginate($this->Filmes);

        $this->set(compact('filmes'));
    }

    /**
     * View method
     *
     * @param string|null $id Filme id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filme = $this->Filmes->get($id, [
            'contain' => ['Generos', 'Ators', 'Criticas'],
        ]);

        $this->set(compact('filme'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filme = $this->Filmes->newEmptyEntity();
        if ($this->request->is('post')) {
            $filme = $this->Filmes->patchEntity($filme, $this->request->getData());
            if ($this->Filmes->save($filme)) {
                $this->Flash->success(__('The filme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filme could not be saved. Please, try again.'));
        }
        $generos = $this->Filmes->Generos->find('list', ['limit' => 200]);
        $ators = $this->Filmes->Ators->find('list', ['limit' => 200]);
        $this->set(compact('filme', 'generos', 'ators'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Filme id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filme = $this->Filmes->get($id, [
            'contain' => ['Ators'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filme = $this->Filmes->patchEntity($filme, $this->request->getData());
            if ($this->Filmes->save($filme)) {
                $this->Flash->success(__('The filme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filme could not be saved. Please, try again.'));
        }
        $generos = $this->Filmes->Generos->find('list', ['limit' => 200]);
        $ators = $this->Filmes->Ators->find('list', ['limit' => 200]);
        $this->set(compact('filme', 'generos', 'ators'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Filme id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filme = $this->Filmes->get($id);
        if ($this->Filmes->delete($filme)) {
            $this->Flash->success(__('The filme has been deleted.'));
        } else {
            $this->Flash->error(__('The filme could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
