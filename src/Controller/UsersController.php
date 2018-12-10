<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
	$this->Auth->allow('workspace');
    }

public function isAuthorized($user)
{

    if (($user['roles_id'] == 2 || $user['roles_id'] == 3 || $user['roles_id'] == 4) && $this->request->action != 'logout') {
        return false;
    }

return parent::isAuthorized($user);

}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->viewBuilder()->setLayout('user');
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $uid = $this->Auth->User('id');
        $userAuth = $this->Users->get($uid);
        $userWorkspaceId = $userAuth->workspaces_id;
        $users = $this->paginate($this->Users, ['conditions' => ['workspaces_id =' => $userWorkspaceId]]);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

/**
 * View method
 *
 * @param string|null $id User id.
 * @return \Cake\Http\Response|void
 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 */
public function view($id = null) {
    $this->viewBuilder()->setLayout('user');
    $user = $this->Users->get($id, [
        'contain' => ['Roles']
    ]);

    $this->set('user', $user);
    $this->set('_serialize', ['user']);
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->viewBuilder()->setLayout('user');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $uid = $this->Auth->User('id');
            $userAuth = $this->Users->get($uid);
            $userWorkspaceId = $userAuth->workspaces_id;
            $this->request->data['workspaces_id'] = $userWorkspaceId;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'Projects', 'action' => 'home']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 4]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

 public function workspace($workspaceId = null) {
        $this->viewBuilder()->setLayout('user');
        if ($workspaceId) {
            $idWorkspace = $workspaceId;
            $this->loadModel('Roles');
            $roleQuery = $this->Roles->find()
            	->select(['name','id'])
                ->where(['id =' => '1']);
                foreach($roleQuery as $roleQueryResult) {
                    $result = $roleQueryResult;
                }
                $role = $result['name'];

                $user = $this->Users->newEntity();
            	if ($this->request->is('post')) {
                	$this->request->data['roles_id'] = $result['id'];
                	$this->request->data['workspaces_id'] = $idWorkspace;
                	$user = $this->Users->patchEntity($user, $this->request->getData());
                	if ($this->Users->save($user)) {
                    	$this->Flash->success(__('The user has been saved.'));
                    	return $this->redirect(['action' => 'login']);
                	}
                	$this->Flash->error(__('The user could not be saved. Please, try again.'));
            	}
        $this->set(compact('user', 'role'));
        $this->set('_serialize', ['user']);
        } else {
            $this->redirect('/');
        }
}
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->viewBuilder()->setLayout('user');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        $this->viewBuilder()->setLayout('login');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
		$this->request->session()->delete('projectid');
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again please.'));
        }
    }

    public function logout() {
	$this->request->session()->delete('projectid');
        return $this->redirect($this->Auth->logout());
    }

}
