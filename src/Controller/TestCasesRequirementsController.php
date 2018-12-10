<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TestCasesRequirements Controller
 *
 * @property \App\Model\Table\TestCasesRequirementsTable $TestCasesRequirements
 *
 * @method \App\Model\Entity\TestCasesRequirement[] paginate($object = null, array $settings = [])
 */
class TestCasesRequirementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TestCases', 'Requirements']
        ];
        $testCasesRequirements = $this->paginate($this->TestCasesRequirements);

        $this->set(compact('testCasesRequirements'));
        $this->set('_serialize', ['testCasesRequirements']);
    }

    /**
     * View method
     *
     * @param string|null $id Test Cases Requirement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testCasesRequirement = $this->TestCasesRequirements->get($id, [
            'contain' => ['TestCases', 'Requirements']
        ]);

        $this->set('testCasesRequirement', $testCasesRequirement);
        $this->set('_serialize', ['testCasesRequirement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testCasesRequirement = $this->TestCasesRequirements->newEntity();
        if ($this->request->is('post')) {
            $testCasesRequirement = $this->TestCasesRequirements->patchEntity($testCasesRequirement, $this->request->getData());
            if ($this->TestCasesRequirements->save($testCasesRequirement)) {
                $this->Flash->success(__('The test cases requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test cases requirement could not be saved. Please, try again.'));
        }
        $testCases = $this->TestCasesRequirements->TestCases->find('list', ['limit' => 200]);
        $requirements = $this->TestCasesRequirements->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('testCasesRequirement', 'testCases', 'requirements'));
        $this->set('_serialize', ['testCasesRequirement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Test Cases Requirement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testCasesRequirement = $this->TestCasesRequirements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testCasesRequirement = $this->TestCasesRequirements->patchEntity($testCasesRequirement, $this->request->getData());
            if ($this->TestCasesRequirements->save($testCasesRequirement)) {
                $this->Flash->success(__('The test cases requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test cases requirement could not be saved. Please, try again.'));
        }
        $testCases = $this->TestCasesRequirements->TestCases->find('list', ['limit' => 200]);
        $requirements = $this->TestCasesRequirements->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('testCasesRequirement', 'testCases', 'requirements'));
        $this->set('_serialize', ['testCasesRequirement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Test Cases Requirement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testCasesRequirement = $this->TestCasesRequirements->get($id);
        if ($this->TestCasesRequirements->delete($testCasesRequirement)) {
            $this->Flash->success(__('The test cases requirement has been deleted.'));
        } else {
            $this->Flash->error(__('The test cases requirement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
