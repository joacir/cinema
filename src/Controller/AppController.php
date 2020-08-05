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
        $this->loadComponent('Authorization.Authorization');
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
        $this->viewBuilder()->setLayout('bootstrap');
        $this->viewBuilder()->setHelpers(['Pdf.Report', 'Js']);        
    }

    public function index() 
    {
        $entity = $this->{$this->getModelName()}->newEmptyEntity();
        $this->Authorization->authorize($entity);
        $this->setPaginateConditions();
        try {
            $this->set($this->getControllerName(), $this->paginate());        
        } catch (NotFoundException $e) {
            $this->redirect('/' . $this->getControllerName());
        }        
    }

    public function add() 
    {
        $entity = $this->{$this->getModelName()}->newEmptyEntity();
        $this->Authorization->authorize($entity);
        if ($this->request->is('post')) {
            $entity = $this->{$this->getModelName()}->patchEntity($entity, $this->request->getData());
            if ($this->{$this->getModelName()}->save($entity)) {
                $this->Flash->bootstrap(__('Gravado com sucesso!'), ['key' => 'success']);
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('entity'));
    }

    public function edit($id = null) 
    {
        $entity = $this->getEditEntity($id);
        $this->Authorization->authorize($entity);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entity = $this->{$this->getModelName()}->patchEntity($entity, $this->request->getData());
            if ($this->{$this->getModelName()}->save($entity)) {
                $this->Flash->bootstrap(__('Alterado com sucesso!'), ['key' => 'success']);
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('entity'));
    }

    public function view($id = null) 
    {
        $entity = $this->getEditEntity($id);
        $this->Authorization->authorize($entity);
        $this->set(compact('entity'));
    }

    public function delete($id) 
    {
        $this->request->allowMethod(['post', 'delete']);
        $entity = $this->{$this->getModelName()}->get($id);
        $this->Authorization->authorize($entity);
        if ($this->{$this->getModelName()}->delete($entity)) {
            $this->Flash->bootstrap(__('Excluído com sucesso!'), ['key' => 'warning']);
        } else {
            $this->Flash->bootstrap(__('Não foi possível excluir. Tente novamente!', ['key' => 'danger']));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function report() {
        $entity = $this->{$this->getModelName()}->newEmptyEntity();
        $this->Authorization->authorize($entity);
        $this->viewBuilder()->setLayout('ajax');
        $this->response = $this->response->withType('pdf');
        $this->set($this->getControllerName(), $this->paginate());        
    }

    public function getControllerName() 
    {
        return \Cake\Utility\Inflector::underscore($this->request->getParam('controller'));
    }

    public function getModelName() 
    {
        return $this->request->getParam('controller');
    }

    public function setFilmes() {
        $this->set('filmes', $this->{$this->getModelName()}->Filmes->find('list', ['conditions' => 'Filmes.deleted IS NULL']));
    }
    
}
