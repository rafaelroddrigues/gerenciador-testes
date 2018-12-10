<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Filesystem\Folder;

/**
 * Workspaces Controller
 *
 * @property \App\Model\Table\WorkspacesTable $Workspaces
 *
 * @method \App\Model\Entity\Workspace[] paginate($object = null, array $settings = [])
 */
class WorkspacesController extends AppController
{
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow('home');
        $this->Auth->allow('add');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    $this->viewBuilder()->setLayout('workspace');
	$workspace = $this->Workspaces->newEntity();
    if ($this->request->is('post')) {
		$workspace = $this->Workspaces->patchEntity($workspace, $this->request->getData());
		if ($this->Workspaces->save($workspace)) {
			$workspaceId = $this->Workspaces->find('all');
			$workspaceId = $workspaceId->last('id');

			$reg = $this->Workspaces->findByName($workspace->name)->toArray();
			$path = WWW_ROOT.'testcafe'.DS.$reg[0]['name'];
			$dir = new Folder();
			$dir->chmod($path, 0755, true);
			if ($dir->create($path)) {
				$this->Flash->success(__('The workspace has been saved.'));
				return $this->redirect(['controller' => 'users', 'action' => 'workspace/'.$workspaceId['id']]);
			} else {
				$this->Flash->error(__('The workspace folder could not be saved. Please, try again.'));
			}
		} else {
			$this->Flash->error(__('The workspace could not be saved. Please, try again.'));
		}
    }
$this->set(compact('workspace'));
                $this->set('_serialize', ['workspace']);
    }

    public function home() {
        $this->viewBuilder()->setLayout('index');

    }
}
