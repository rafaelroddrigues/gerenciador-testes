<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;

/**
 * Executions Controller
 *
 * @property \App\Model\Table\ExecutionsTable $Executions
 *
 * @method \App\Model\Entity\Execution[] paginate($object = null, array $settings = [])
 */
class ExecutionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('execution');
        $this->paginate = [
            'contain' => ['TestCases', 'Users', 'Phases']
        ];
        $executions = $this->paginate($this->Executions, ['conditions' => ['Executions.projects_id =' => $this->request->session()->read('projectid')]]);

        $this->set(compact('executions'));
        $this->set('_serialize', ['executions']);
    }

    /**
     * View method
     *
     * @param string|null $id Execution id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('execution');
        $execution = $this->Executions->get($id, [
            'contain' => ['TestCases', 'Users', 'Phases']
        ]);

        $this->loadModel('TestCases');
        $testCase = $this->TestCases->get($execution['test_cases_id'], [
            'contain' => ['TestPlans', 'Preconditions', 'Requirements', 'TestCaseSteps']
        ]);

        $this->set(compact('execution','testCase'));
        $this->set('_serialize', ['execution','testCase']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('execution');
        $execution = $this->Executions->newEntity();
        if ($this->request->is('post')) {
            $execution = $this->Executions->patchEntity($execution, $this->request->getData());
            if ($this->Executions->save($execution)) {
                $this->Flash->success(__('The execution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The execution could not be saved. Please, try again.'));
        }
        $testCases = $this->Executions->TestCases->find('list')
        ->select(['name'])
        ->where(['TestCases.projects_id =' => $this->request->session()->read('projectid')]);
        $users = $this->Executions->Users->find('list', ['limit' => 200]);
        $phases = $this->Executions->Phases->find('list', ['limit' => 200]);
        $this->set(compact('execution', 'testCases', 'users', 'phases'));
        $this->set('_serialize', ['execution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Execution id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('execution');
        $execution = $this->Executions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $execution = $this->Executions->patchEntity($execution, $this->request->getData());
            if ($this->Executions->save($execution)) {
                $this->Flash->success(__('The execution has been saved.'));

                return $this->redirect(['action' => 'selected']);
            }
            $this->Flash->error(__('The execution could not be saved. Please, try again.'));
        }
        $testCases = $this->Executions->TestCases->find('list')
        ->select(['name'])
        ->where(['TestCases.projects_id =' => $this->request->session()->read('projectid')]);
	$this->loadModel('Users');
        $uid = $this->Auth->User('id');
        $user = $this->Users->get($uid);
        $userWorkspaceId = $user->workspaces_id;
	$users = $this->Executions->Users->find('list')
        ->select(['name'])
        ->where(['Users.workspaces_id =' => $userWorkspaceId]);
        $phases = $this->Executions->Phases->find('list', ['limit' => 200]);
        $this->set(compact('execution', 'testCases', 'users', 'phases'));
        $this->set('_serialize', ['execution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Execution id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $execution = $this->Executions->get($id);
        if ($this->Executions->delete($execution)) {
            $this->Flash->success(__('The execution has been deleted.'));
        } else {
            $this->Flash->error(__('The execution could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'selected']);
    }

    public function home() {
        $this->viewBuilder()->setLayout('home');
        $this->loadModel('Phases');
        $phases = $this->Phases->find('list')->select(['id','name'])->toArray();
        $this->set(compact('phases'));

        if ($this->request->is('post')) {
            return $this->redirect(['controller' => 'Executions', 'action' => 'selected']);
        }
    }

    public function selected() {
        $this->viewBuilder()->setLayout('execution');
        if ($this->request->is('post')) {
            $id = $this->request->getData('phase');
            $this->request->session()->write('phaseid',$id);
        }
        $this->loadModel('Phases');
        $sessionid = $this->request->session()->read('phaseid');
        $phasename = $this->Phases->get($sessionid);
        $phasename = $phasename->name;

        $this->paginate = [
            'contain' => ['TestCases', 'Users', 'Phases']
        ];
        $executions = $this->paginate($this->Executions, 
        	['conditions' => ['Executions.projects_id =' => $this->request->session()->read('projectid'), 'Executions.phases_id =' => $this->request->session()->read('phaseid')]]
        );

        $this->set(compact('phasename','executions'));
        $this->set('_serialize', ['executions']);
        $this->request->session()->write('phasename',$phasename);
    }

    public function addTestCase()
    {
        $this->viewBuilder()->setLayout('execution');
        $execution = $this->Executions->newEntity();
        if ($this->request->is('post')) {
            $execution = $this->Executions->patchEntity($execution, $this->request->getData());
            if ($this->Executions->save($execution)) {
                $this->Flash->success(__('The execution has been saved.'));

                return $this->redirect(['action' => 'selected']);
            }
            $this->Flash->error(__('The execution could not be saved. Please, try again.'));
        }
        $testCases = $this->Executions->TestCases->find('list')
        ->select(['name'])
        ->where(['TestCases.projects_id =' => $this->request->session()->read('projectid')]);
        $uid = $this->Auth->User('id');
        $this->loadModel('Users');
        $userAuth = $this->Users->get($uid);
        $userWorkspaceId = $userAuth->workspaces_id;
        $users = $this->Executions->Users->find('list')
        ->select(['name'])
        ->where(['Users.workspaces_id =' => $userWorkspaceId]);
        $this->set(compact('execution', 'testCases', 'users'));
        $this->set('_serialize', ['execution']);
    }

    public function report(){
        $this->viewBuilder()->setLayout('home');
        $executionsqa = $this->Executions->find()
            ->select(['status'])
            ->where(['phases_id' => '1'])
            ->where(['projects_id =' => $this->request->session()->read('projectid')]);

        $qa = $this->Executions->find()
            ->where(['phases_id' => '1'])
            ->where(['projects_id =' => $this->request->session()->read('projectid')])
            ->count();

        $executionshml = $this->Executions->find()
            ->select(['status'])
            ->where(['phases_id' => '2'])
            ->where(['projects_id =' => $this->request->session()->read('projectid')]);
        $hml = $this->Executions->find()
            ->where(['phases_id' => '2'])
            ->where(['projects_id =' => $this->request->session()->read('projectid')])
            ->count();

        $executionsprod = $this->Executions->find()
            ->select(['status'])
            ->where(['phases_id' => '3'])
            ->where(['projects_id =' => $this->request->session()->read('projectid')]);
        $prod = $this->Executions->find()
            ->where(['phases_id' => '3'])
            ->where(['projects_id =' => $this->request->session()->read('projectid')])
            ->count();

        $this->set(compact('executionsqa','executionshml','executionsprod','qa','hml','prod'));
        $this->set('_serialize', ['executions','qa','hml','prod']);
    }

    public function automated() {
        $this->viewBuilder()->setLayout('home');
        $this->loadModel('TestCases');
        $this->paginate = [
            'contain' => ['TestPlans']
        ];

        $testCases = $this->paginate($this->TestCases, ['conditions' => ['TestCases.projects_id =' => $this->request->session()->read('projectid'), 'TestCases.execution_type =' => '1']]);

        $this->loadModel('Users');
        $uid = $this->Auth->User('id');
        $userAuth = $this->Users->get($uid);
        $userWorkspaceId = $userAuth->workspaces_id;
        $this->loadModel('Workspaces');
        $workspace = $this->Workspaces->get($userWorkspaceId);

        $workspace = $workspace->name;
	$project = $this->request->session()->read('projectname');

        $this->set(compact('testCases','workspace','project'));
        $this->set('_serialize', ['testCases']);
    }

    public function new($id = null) {
        $this->viewBuilder()->setLayout('execution');

        $this->loadModel('TestCases');
        $testCase = $this->TestCases->get($id, [
            'contain' => ['TestPlans', 'Preconditions', 'Requirements', 'TestCaseSteps']
        ]);

        $this->loadModel('Users');
        $uid = $this->Auth->User('id');
        $userAuth = $this->Users->get($uid);
        $userWorkspaceId = $userAuth->workspaces_id;
        $this->loadModel('Workspaces');
        $workspace = $this->Workspaces->get($userWorkspaceId);
        if ($this->request->is('post')) {
            $script = json_encode($this->request->getData());
            $testeDecode = json_decode($script);

            $file = new File(WWW_ROOT.DS.'testcafe'.DS.$workspace->name.DS.$this->request->session()->read('projectname').DS.$testCase->name.'.js', true, 0777);

            $array = array();

            foreach ($testeDecode as $json) {
                $array[] = $json;
            }

            $importFixture = "import { Selector } from 'testcafe';\n\nfixture('Start').page('".$array[0]."')\n\ntest('".$testCase->name."', async t => {\n\n\tawait t\n";

            for ($i=1; $i < count($array); $i+=2) {
                if ($array[$i] === '0') {
                    $action = 'click';
                    $importFixture .= "\t\t.".$action."(Selector('".$array[$i+1]."'))\n";
                } else if ($array[$i] === '1') {
                    $action = 'typeText';
                    $importFixture .= "\t\t.".$action."(Selector('".$array[$i+2]."'),'".$array[$i+1]."')\n";
                    $i++;
                } else if ($array[$i] === '2') {
                    $action = 'hover';
                    $importFixture .= "\t\t.".$action."(Selector('".$array[$i+1]."'))\n";
                } else if ($array[$i] === '3') {
                    $action = 'pressKey';
                    $importFixture .= "\t\t.".$action."(Selector('".$array[$i+1]."'))\n";
                }
            }

            $importFixture .= "\n});";

            $file->write($importFixture);
            if ($file->size() > 0) {
                $this->Flash->success(__('The execution has been saved.'));

                return $this->redirect(['action' => 'automated']);
            }
            $this->Flash->error(__('The execution could not be saved. Please, try again.')); 
        }

        $this->set(compact('testCase'));
        $this->set('_serialize', ['testCase']);
    }

    public function viewScript($name = null) {
        $this->viewBuilder()->setLayout('execution');

        $names = explode("-",$name);
        $file = new File(WWW_ROOT.DS.'testcafe'.DS.$names[0].DS.$names[1].DS.$names[2].'.js');
        $script = $file->read(true,'r');
        $this->set(compact('script'));
    }

}
