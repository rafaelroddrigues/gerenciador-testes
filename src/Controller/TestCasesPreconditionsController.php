<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TestCasesPreconditions Controller
 *
 * @property \App\Model\Table\TestCasesPreconditionsTable $TestCasesPreconditions
 *
 * @method \App\Model\Entity\TestCasesPrecondition[] paginate($object = null, array $settings = [])
 */
class TestCasesPreconditionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TestCases', 'Preconditions']
        ];
        $testCasesPreconditions = $this->paginate($this->TestCasesPreconditions);

        $this->set(compact('testCasesPreconditions'));
        $this->set('_serialize', ['testCasesPreconditions']);
    }

    /**
     * View method
     *
     * @param string|null $id Test Cases Precondition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testCasesPrecondition = $this->TestCasesPreconditions->get($id, [
            'contain' => ['TestCases', 'Preconditions']
        ]);

        $this->set('testCasesPrecondition', $testCasesPrecondition);
        $this->set('_serialize', ['testCasesPrecondition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testCasesPrecondition = $this->TestCasesPreconditions->newEntity();
        if ($this->request->is('post')) {
            $testCasesPrecondition = $this->TestCasesPreconditions->patchEntity($testCasesPrecondition, $this->request->getData());
            if ($this->TestCasesPreconditions->save($testCasesPrecondition)) {
                $this->Flash->success(__('The test cases precondition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test cases precondition could not be saved. Please, try again.'));
        }
        $testCases = $this->TestCasesPreconditions->TestCases->find('list', ['limit' => 200]);
        $preconditions = $this->TestCasesPreconditions->Preconditions->find('list', ['limit' => 200]);
        $this->set(compact('testCasesPrecondition', 'testCases', 'preconditions'));
        $this->set('_serialize', ['testCasesPrecondition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Test Cases Precondition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testCasesPrecondition = $this->TestCasesPreconditions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testCasesPrecondition = $this->TestCasesPreconditions->patchEntity($testCasesPrecondition, $this->request->getData());
            if ($this->TestCasesPreconditions->save($testCasesPrecondition)) {
                $this->Flash->success(__('The test cases precondition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test cases precondition could not be saved. Please, try again.'));
        }
        $testCases = $this->TestCasesPreconditions->TestCases->find('list', ['limit' => 200]);
        $preconditions = $this->TestCasesPreconditions->Preconditions->find('list', ['limit' => 200]);
        $this->set(compact('testCasesPrecondition', 'testCases', 'preconditions'));
        $this->set('_serialize', ['testCasesPrecondition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Test Cases Precondition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testCasesPrecondition = $this->TestCasesPreconditions->get($id);
        if ($this->TestCasesPreconditions->delete($testCasesPrecondition)) {
            $this->Flash->success(__('The test cases precondition has been deleted.'));
        } else {
            $this->Flash->error(__('The test cases precondition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
