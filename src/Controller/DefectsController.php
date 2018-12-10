<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Defects Controller
 *
 * @property \App\Model\Table\DefectsTable $Defects
 *
 * @method \App\Model\Entity\Defect[] paginate($object = null, array $settings = [])
 */
class DefectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
	$this->viewBuilder()->setLayout('defect');
        $this->paginate = [
            'contain' => ['TestCaseSteps', 'Executions','Phases']
        ];
        $defects = $this->paginate($this->Defects, ['conditions' => ['Defects.projects_id =' => $this->request->session()->read('projectid')]]);

        $this->set(compact('defects'));
        $this->set('_serialize', ['defects']);
    }

    /**
     * View method
     *
     * @param string|null $id Defect id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
	$this->viewBuilder()->setLayout('defect');
        $defect = $this->Defects->get($id, [
            'contain' => ['TestCaseSteps', 'Executions', 'Phases']
        ]);

        $this->set('defect', $defect);
        $this->set('_serialize', ['defect']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
	$this->viewBuilder()->setLayout('defect');
        $defect = $this->Defects->newEntity();
        if ($this->request->is('post')) {
            $defect = $this->Defects->patchEntity($defect, $this->request->getData());
            if ($this->Defects->save($defect)) {
                $this->Flash->success(__('The defect has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The defect could not be saved. Please, try again.'));
        }
        $testCaseSteps = $this->Defects->TestCaseSteps->find('list', ['limit' => 200]);
        $executions = $this->Defects->Executions->find('list', ['limit' => 200]);
	$phases = $this->Defects->Phases->find('list', ['limit' => 200]);
        $this->set(compact('defect', 'testCaseSteps', 'executions', 'phases'));
        $this->set('_serialize', ['defect']);
    }

    public function addFromExecution($step = null, $execution = null)
    {
	$this->viewBuilder()->setLayout('defect');
        $defect = $this->Defects->newEntity();
        if ($this->request->is('post')) {
            $defect = $this->Defects->patchEntity($defect, $this->request->getData());
            if ($this->Defects->save($defect)) {
                $this->Flash->success(__('The defect has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The defect could not be saved. Please, try again.'));
        }
        $testCaseSteps = $this->Defects->TestCaseSteps->find('list', ['limit' => 200]);
        $executions = $this->Defects->Executions->find('list', ['limit' => 200]);
        $this->set(compact('defect', 'testCaseSteps', 'executions','step','execution'));
        $this->set('_serialize', ['defect']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Defect id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
	$this->viewBuilder()->setLayout('defect');
        $defect = $this->Defects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $defect = $this->Defects->patchEntity($defect, $this->request->getData());
            if ($this->Defects->save($defect)) {
                $this->Flash->success(__('The defect has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The defect could not be saved. Please, try again.'));
        }
        $testCaseSteps = $this->Defects->TestCaseSteps->find('list', ['limit' => 200]);
        $executions = $this->Defects->Executions->find('list', ['limit' => 200]);
        $this->set(compact('defect', 'testCaseSteps', 'executions'));
        $this->set('_serialize', ['defect']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Defect id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $defect = $this->Defects->get($id);
        if ($this->Defects->delete($defect)) {
            $this->Flash->success(__('The defect has been deleted.'));
        } else {
            $this->Flash->error(__('The defect could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
