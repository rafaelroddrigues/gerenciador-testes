<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TestPlans Controller
 *
 * @property \App\Model\Table\TestPlansTable $TestPlans
 *
 * @method \App\Model\Entity\TestPlan[] paginate($object = null, array $settings = [])
 */
class TestPlansController extends AppController
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
        $this->viewBuilder()->setLayout('testplan');
        $this->paginate = [
            'contain' => ['Projects']
        ];
        $testPlans = $this->paginate($this->TestPlans, ['conditions' => ['TestPlans.projects_id =' => $this->request->session()->read('projectid')]]);

        $this->set(compact('testPlans'));
        $this->set('_serialize', ['testPlans']);
    }

    /**
     * View method
     *
     * @param string|null $id Test Plan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('testplan');
        $testPlan = $this->TestPlans->get($id, [
            'contain' => ['Projects']
        ]);

        $this->loadModel('TestCases');
        $testCases = $this->paginate($this->TestCases, ['conditions' => ['TestCases.test_plans_id =' => $testPlan->id],'limit' => 200]);

        $this->set(compact('testPlan', 'testCases'));
        $this->set('_serialize', ['testPlan', 'testCases']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('testplan');
        $testPlan = $this->TestPlans->newEntity();
        if ($this->request->is('post')) {
            $testPlan = $this->TestPlans->patchEntity($testPlan, $this->request->getData());
            if ($this->TestPlans->save($testPlan)) {
                $this->Flash->success(__('The test plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test plan could not be saved. Please, try again.'));
        }
        $this->set(compact('testPlan'));
        $this->set('_serialize', ['testPlan']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Test Plan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {   
        $this->viewBuilder()->setLayout('testplan');
        $testPlan = $this->TestPlans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testPlan = $this->TestPlans->patchEntity($testPlan, $this->request->getData());
            if ($this->TestPlans->save($testPlan)) {
                $this->Flash->success(__('The test plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test plan could not be saved. Please, try again.'));
        }
        $projects = $this->TestPlans->Projects->find('list', ['limit' => 200]);
        $this->set(compact('testPlan', 'projects'));
        $this->set('_serialize', ['testPlan']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Test Plan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testPlan = $this->TestPlans->get($id);
        if ($this->TestPlans->delete($testPlan)) {
            $this->Flash->success(__('The test plan has been deleted.'));
        } else {
            $this->Flash->error(__('The test plan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
