<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TestCasesTestCaseSteps Controller
 *
 * @property \App\Model\Table\TestCasesTestCaseStepsTable $TestCasesTestCaseSteps
 *
 * @method \App\Model\Entity\TestCasesTestCaseStep[] paginate($object = null, array $settings = [])
 */
class TestCasesTestCaseStepsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('testcasestep');
        $this->paginate = [
            'contain' => ['TestCases', 'TestCaseSteps']
        ];
        $testCasesTestCaseSteps = $this->paginate($this->TestCasesTestCaseSteps);

        $this->set(compact('testCasesTestCaseSteps'));
        $this->set('_serialize', ['testCasesTestCaseSteps']);
    }

    /**
     * View method
     *
     * @param string|null $id Test Cases Test Case Step id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('testcasestep');
        $testCasesTestCaseStep = $this->TestCasesTestCaseSteps->get($id, [
            'contain' => ['TestCases', 'TestCaseSteps']
        ]);

        $this->set('testCasesTestCaseStep', $testCasesTestCaseStep);
        $this->set('_serialize', ['testCasesTestCaseStep']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('testcasestep');
        $testCasesTestCaseStep = $this->TestCasesTestCaseSteps->newEntity();
        if ($this->request->is('post')) {
            $testCasesTestCaseStep = $this->TestCasesTestCaseSteps->patchEntity($testCasesTestCaseStep, $this->request->getData());
            if ($this->TestCasesTestCaseSteps->save($testCasesTestCaseStep)) {
                $this->Flash->success(__('The test cases test case step has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test cases test case step could not be saved. Please, try again.'));
        }
        $testCases = $this->TestCasesTestCaseSteps->TestCases->find('list', ['limit' => 200]);
        $testCaseSteps = $this->TestCasesTestCaseSteps->TestCaseSteps->find('list', ['limit' => 200]);
        $this->set(compact('testCasesTestCaseStep', 'testCases', 'testCaseSteps'));
        $this->set('_serialize', ['testCasesTestCaseStep']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Test Cases Test Case Step id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('testcasestep');
        $testCasesTestCaseStep = $this->TestCasesTestCaseSteps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testCasesTestCaseStep = $this->TestCasesTestCaseSteps->patchEntity($testCasesTestCaseStep, $this->request->getData());
            if ($this->TestCasesTestCaseSteps->save($testCasesTestCaseStep)) {
                $this->Flash->success(__('The test cases test case step has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test cases test case step could not be saved. Please, try again.'));
        }
        $testCases = $this->TestCasesTestCaseSteps->TestCases->find('list', ['limit' => 200]);
        $testCaseSteps = $this->TestCasesTestCaseSteps->TestCaseSteps->find('list', ['limit' => 200]);
        $this->set(compact('testCasesTestCaseStep', 'testCases', 'testCaseSteps'));
        $this->set('_serialize', ['testCasesTestCaseStep']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Test Cases Test Case Step id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testCasesTestCaseStep = $this->TestCasesTestCaseSteps->get($id);
        if ($this->TestCasesTestCaseSteps->delete($testCasesTestCaseStep)) {
            $this->Flash->success(__('The test cases test case step has been deleted.'));
        } else {
            $this->Flash->error(__('The test cases test case step could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
