<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Preconditions Controller
 *
 * @property \App\Model\Table\PreconditionsTable $Preconditions
 *
 * @method \App\Model\Entity\Precondition[] paginate($object = null, array $settings = [])
 */
class PreconditionsController extends AppController
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
        $this->viewBuilder()->setLayout('precondition');
        $preconditions = $this->paginate($this->Preconditions, ['conditions' => ['Preconditions.projects_id =' => $this->request->session()->read('projectid')]]);

        $this->set(compact('preconditions'));
        $this->set('_serialize', ['preconditions']);
    }

    /**
     * View method
     *
     * @param string|null $id Precondition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('precondition');
        $precondition = $this->Preconditions->get($id, [
            'contain' => ['TestCases']
        ]);

        $this->set('precondition', $precondition);
        $this->set('_serialize', ['precondition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('precondition');
        $precondition = $this->Preconditions->newEntity();
        if ($this->request->is('post')) {
            $precondition = $this->Preconditions->patchEntity($precondition, $this->request->getData());
            if ($this->Preconditions->save($precondition)) {
                $this->Flash->success(__('The precondition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The precondition could not be saved. Please, try again.'));
        }
        $testCases = $this->Preconditions->TestCases->find('list')
        ->select(['name'])
        ->where(['TestCases.projects_id =' => $this->request->session()->read('projectid')]);
        $this->set(compact('precondition', 'testCases'));
        $this->set('_serialize', ['precondition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Precondition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('precondition');
        $precondition = $this->Preconditions->get($id, [
            'contain' => ['TestCases']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $precondition = $this->Preconditions->patchEntity($precondition, $this->request->getData());
            if ($this->Preconditions->save($precondition)) {
                $this->Flash->success(__('The precondition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The precondition could not be saved. Please, try again.'));
        }
        $testCases = $this->Preconditions->TestCases->find('list')
        ->select(['name'])
        ->where(['TestCases.projects_id =' => $this->request->session()->read('projectid')]);
        $this->set(compact('precondition', 'testCases'));
        $this->set('_serialize', ['precondition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Precondition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $testCaseId = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('TestCasesPreconditions');
        $precondtionsJoin = $this->TestCasesPreconditions->find()
            ->select(['id'])
            ->where(['preconditions_id =' => $id])
            ->where(['test_cases_id =' => $testCaseId]);
        foreach($precondtionsJoin as $precondtionsJoinId) {
            $result = $precondtionsJoinId;
        }
        if ($this->TestCasesPreconditions->delete($result)) {
            $this->Flash->success(__('The precondition has been removed from this test case.'));
        } else {
            $this->Flash->error(__('The precondition could not be removed from this test case. Please, try again.'));
        }

        return $this->redirect(['controller' => 'TestCases', 'action' => 'view/'.$testCaseId]);
    }

    public function permaDelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $precondition = $this->Preconditions->get($id);
        if ($this->Preconditions->delete($precondition)) {
            $this->Flash->success(__('The precondition has been deleted.'));
        } else {
            $this->Flash->error(__('The precondition could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
