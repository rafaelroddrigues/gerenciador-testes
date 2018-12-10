<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Error\Debugger;
use Cake\Log\Log;

/**
 * TestCases Controller
 *
 * @property \App\Model\Table\TestCasesTable $TestCases
 *
 * @method \App\Model\Entity\TestCase[] paginate($object = null, array $settings = [])
 */
class TestCasesController extends AppController
{

public function isAuthorized($user)
{

    if ($user['roles_id'] == 4) {
        return false;
    }

return parent::isAuthorized($user);

}

    /** 
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('testcase');
        $this->paginate = [
            'contain' => ['TestPlans']
        ];
        $testCases = $this->paginate($this->TestCases, ['conditions' => ['TestCases.projects_id =' => $this->request->session()->read('projectid')]]);

        $this->set(compact('testCases'));
        $this->set('_serialize', ['testCases']);
    }

    /**
     * View method
     *
     * @param string|null $id Test Case id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('testcase');
        $testCase = $this->TestCases->get($id, [
            'contain' => ['TestPlans', 'Preconditions', 'Requirements', 'TestCaseSteps']
        ]);

        $this->set(compact('testCase'));
        $this->set('_serialize', ['testCase']);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('testcase');
        $testCase = $this->TestCases->newEntity();
        if ($this->request->is('post')) {

            $ent = $this->request->getData();
            $testCase = $this->TestCases->patchEntity($testCase, $ent);

            if ($this->TestCases->save($testCase)) {
                $this->Flash->success(__('The test case has been saved.'));
                return $this->redirect(['controller' => 'TestCases' ,'action' => 'index']);
	    }
            $this->Flash->error(__('The test case could not be saved. Please, try again.'));
        }
        $testPlans = $this->TestCases->TestPlans->find('list', ['conditions' => ['TestPlans.projects_id =' => $this->request->session()->read('projectid')],'limit' => 200]);
        $this->set(compact('testCase', 'testPlans'));
        $this->set('_serialize', ['testCase']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Test Case id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('testcase');
        $testCase = $this->TestCases->get($id, [
            'contain' => ['Preconditions', 'Requirements', 'TestCaseSteps']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testCase = $this->TestCases->patchEntity($testCase, $this->request->getData());
            if ($this->TestCases->save($testCase)) {
                $this->Flash->success(__('The test case has been saved.'));

                  return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test case could not be saved. Please, try again.'));
        }
        $testPlans = $this->TestCases->TestPlans->find('list', ['conditions' => ['TestPlans.projects_id =' => $this->request->session()->read('projectid')],'limit' => 200]);
        $preconditions = $this->TestCases->Preconditions->find('list', ['conditions' => ['Preconditions.projects_id =' => $this->request->session()->read('projectid')],'limit' => 200]);
        $requirements = $this->TestCases->Requirements->find('list', ['conditions' => ['Requirements.projects_id =' => $this->request->session()->read('projectid')],'limit' => 200]);
        $testCaseSteps = $this->TestCases->TestCaseSteps->find('list', ['conditions' => ['TestCaseSteps.projects_id =' => $this->request->session()->read('projectid')],'limit' => 200]);
        $this->set(compact('testCase', 'testPlans', 'preconditions', 'requirements', 'testCaseSteps'));
        $this->set('_serialize', ['testCase']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Test Case id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $testPlanId = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testCase = $this->TestCases->get($id);
        if ($this->TestCases->delete($testCase)) {
            $this->Flash->success(__('The test case has been deleted.'));
        } else {
            $this->Flash->error(__('The test case could not be deleted. Please, try again.'));
        }

	return $this->redirect(['controller' => 'TestPlans', 'action' => 'view/'.$testPlanId]);
    }

     public function indexDelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testCase = $this->TestCases->get($id);
        if ($this->TestCases->delete($testCase)) {
            $this->Flash->success(__('The test case has been deleted.'));
        } else {
            $this->Flash->error(__('The test case could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function addtestcase()
    {
        $this->viewBuilder()->setLayout('testcase');        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testCase = $this->TestCases->get($this->request->getData("test_cases_id"), [
            'contain' => ['Preconditions', 'Requirements', 'TestCaseSteps']]);
            $testCase = $this->TestCases->patchEntity($testCase, $this->request->getData());
            if ($this->TestCases->save($testCase)) {
                $this->Flash->success(__('The test case has been added to test plan.'));

                  return $this->redirect(['controller' => 'TestPlans','action' => 'view/'.$this->request->getData("test_plans_id")]);
            }
            $this->Flash->error(__('The test case could not be added to test plan. Please, try again.'));
        }
        $this->loadModel('TestPlans');

        $testPlans = $this->TestPlans->find('list');
        
        $testCases = $this->TestCases->find('list');

        $this->set(compact('testPlans','testCases'));
        $this->set('_serialize', ['testPlans','testCases']);
    }
}
