<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TestCaseSteps Controller
 *
 * @property \App\Model\Table\TestCaseStepsTable $TestCaseSteps
 *
 * @method \App\Model\Entity\TestCaseStep[] paginate($object = null, array $settings = [])
 */
class TestCaseStepsController extends AppController
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
        $this->viewBuilder()->setLayout('testcasestep');
        $testCaseSteps = $this->paginate($this->TestCaseSteps, ['conditions' => ['TestCaseSteps.projects_id =' => $this->request->session()->read('projectid')]]);

        $this->set(compact('testCaseSteps'));
        $this->set('_serialize', ['testCaseSteps']);
    }

    /**
     * View method
     *
     * @param string|null $id Test Case Step id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('testcasestep');
        $testCaseStep = $this->TestCaseSteps->get($id, [
            'contain' => ['TestCases']
        ]);

        $this->set('testCaseStep', $testCaseStep);
        $this->set('_serialize', ['testCaseStep']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('testcasestep');
        $testCaseStep = $this->TestCaseSteps->newEntity();
        if ($this->request->is('post')) {
            $testCaseStep = $this->TestCaseSteps->patchEntity($testCaseStep, $this->request->getData());
            if ($this->TestCaseSteps->save($testCaseStep)) {
                $this->Flash->success(__('The test case step has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test case step could not be saved. Please, try again.'));
        }
        $testCases = $this->TestCaseSteps->TestCases->find('list')
        ->select(['name'])
        ->where(['TestCases.projects_id =' => $this->request->session()->read('projectid')]);
        $this->set(compact('testCaseStep', 'testCases'));
        $this->set('_serialize', ['testCaseStep']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Test Case Step id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('testcasestep');
        $testCaseStep = $this->TestCaseSteps->get($id, [
            'contain' => ['TestCases']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testCaseStep = $this->TestCaseSteps->patchEntity($testCaseStep, $this->request->getData());
            if ($this->TestCaseSteps->save($testCaseStep)) {
                $this->Flash->success(__('The test case step has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test case step could not be saved. Please, try again.'));
        }
        $testCases = $this->TestCaseSteps->TestCases->find('list')
        ->select(['name'])
        ->where(['TestCases.projects_id =' => $this->request->session()->read('projectid')]);
        $this->set(compact('testCaseStep', 'testCases'));
        $this->set('_serialize', ['testCaseStep']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Test Case Step id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $testCaseId = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('TestCasesTestCaseSteps');
        $testCaseStepJoin = $this->TestCasesTestCaseSteps->find()
            ->select(['id'])
            ->where(['test_case_steps_id =' => $id])
            ->where(['test_cases_id =' => $testCaseId]);
        foreach($testCaseStepJoin as $testCaseStepJoinId) {
            $result = $testCaseStepJoinId;
        }
        if ($this->TestCasesTestCaseSteps->delete($result)) {
            $this->Flash->success(__('The test case step has been removed from this test case.'));
        } else {
            $this->Flash->error(__('The test case step could not be removed from this test case. Please, try again.'));
        }

        return $this->redirect(['controller' => 'TestCases', 'action' => 'view/'.$testCaseId]);
    }

    public function permaDelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testCaseStep = $this->TestCaseSteps->get($id);
        if ($this->TestCaseSteps->delete($testCaseStep)) {
            $this->Flash->success(__('The test case step has been deleted.'));
        } else {
            $this->Flash->error(__('The test case step could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
