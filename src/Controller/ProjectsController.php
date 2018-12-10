<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[] paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{

public function isAuthorized($user)
{

    if (($user['roles_id'] == 3 || $user['roles_id'] == 4) && $this->request->action != 'home' && $this->request->action != 'selected') {
        return false;
    }

return parent::isAuthorized($user);

}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $this->loadModel('Users');
            $uid = $this->Auth->User('id');
            $userAuth = $this->Users->get($uid);
            $userWorkspaceId = $userAuth->workspaces_id;
            $this->request->data['workspaces_id'] = $userWorkspaceId;
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {

                $workspacesName = $this->Projects->Workspaces->get($userWorkspaceId);

                $reg = $this->Projects->findByName($project->name)->toArray();
                $path = WWW_ROOT.'testcafe'.DS.$workspacesName->name.DS.$reg[0]['name'];
                $dir = new Folder();
		$dir->chmod($path, 0755, true);
		if ($dir->create($path)) {

		$this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'home']);
		} else {
		$this->Flash->error(__('The project folder could not be saved. Please, try again.'));
		}
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $workspaces = $this->Projects->Workspaces->find('list', ['limit' => 200]);
        $this->set(compact('project', 'workspaces'));
        $this->set('_serialize', ['project']);
    }

    public function home() {
        $this->viewBuilder()->setLayout('home');
		$this->loadModel('Users');
        $uid = $this->Auth->User('id');
        $user = $this->Users->get($uid);
        $userWorkspaceId = $user->workspaces_id;

        $this->loadModel('Workspaces');
        $workspacesName = $this->Workspaces->get($userWorkspaceId);

        $role = $user->roles_id;

        $projects = $this->Projects->find('list')
        	->select(['id','name'])
        	->where(['workspaces_id =' => $userWorkspaceId])
        	->toArray();
        $this->set(compact('projects','role','workspacesName'));

        if ($this->request->is('post')) {
            return $this->redirect(['controller' => 'Projects', 'action' => 'selected']);
        }
    }

    public function selected() {
        $this->viewBuilder()->setLayout('home');

        if ($this->request->is('post')) {
            $id = $this->request->getData('project');
            $this->request->session()->write('projectid',$id);
        }
        $sessionid = $this->request->session()->read('projectid');
        $projectname = $this->Projects->get($sessionid);
        $projectname = $projectname->name;
        $this->set(compact('projectname'));
        $this->request->session()->write('projectname',$projectname);
    }
}
