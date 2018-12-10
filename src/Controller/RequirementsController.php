<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Requirements Controller
 *
 * @property \App\Model\Table\RequirementsTable $Requirements
 *
 * @method \App\Model\Entity\Requirement[] paginate($object = null, array $settings = [])
 */
class RequirementsController extends AppController
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
        $this->viewBuilder()->setLayout('requirement');
        $requirements = $this->paginate($this->Requirements, ['conditions' => ['Requirements.projects_id =' => $this->request->session()->read('projectid')]]);

        $this->set(compact('requirements'));
        $this->set('_serialize', ['requirements']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('requirement');
        $requirement = $this->Requirements->get($id, [
            'contain' => ['TestCases']
        ]);

        $this->set('requirement', $requirement);
        $this->set('_serialize', ['requirement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('requirement');
        $requirement = $this->Requirements->newEntity();
        if ($this->request->is('post')) {
            $requirement = $this->Requirements->patchEntity($requirement, $this->request->getData());
            if ($this->Requirements->save($requirement)) {
                $this->Flash->success(__('The requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requirement could not be saved. Please, try again.'));
        }
        $testCases = $this->Requirements->TestCases->find('list')
        ->select(['name'])
        ->where(['TestCases.projects_id =' => $this->request->session()->read('projectid')]);
        $this->set(compact('requirement', 'testCases'));
        $this->set('_serialize', ['requirement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('requirement');
        $requirement = $this->Requirements->get($id, [
            'contain' => ['TestCases']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirement = $this->Requirements->patchEntity($requirement, $this->request->getData());
            if ($this->Requirements->save($requirement)) {
                $this->Flash->success(__('The requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requirement could not be saved. Please, try again.'));
        }
        $testCases = $this->Requirements->TestCases->find('list')
        ->select(['name'])
        ->where(['TestCases.projects_id =' => $this->request->session()->read('projectid')]);
        $this->set(compact('requirement', 'testCases'));
        $this->set('_serialize', ['requirement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $testCaseId = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('TestCasesRequirements');
        $requirementsJoin = $this->TestCasesRequirements->find()
            ->select(['id'])
            ->where(['requirements_id =' => $id])
            ->where(['test_cases_id =' => $testCaseId]);
        foreach($requirementsJoin as $requirementsJoinId) {
            $result = $requirementsJoinId;
        }
        if ($this->TestCasesRequirements->delete($result)) {
            $this->Flash->success(__('The precondition has been removed from this test case.'));
        } else {
            $this->Flash->error(__('The precondition could not be removed from this test case. Please, try again.'));
        }

        return $this->redirect(['controller' => 'TestCases', 'action' => 'view/'.$testCaseId]);
    }

    public function permaDelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirement = $this->Requirements->get($id);
        if ($this->Requirements->delete($requirement)) {
            $this->Flash->success(__('The requirement has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
