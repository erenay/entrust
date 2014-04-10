<?php

class RoleIntegrationTest extends PHPUnit_Framework_TestCase{
	
	public function testRolesUserPivotTableGetsPopulatedAfterRoleAssignedToUserForProject (){
	
		$this->markTestSkipped(); // 
	
		$user = User::find(1);
	
		$role = Role::firstOrCreate(array('name' =>  "Project Manager"));
		$project = Project::firstOrCreate(array('title' =>  "Test Project", 'user_id' => $user->id));
	
		$user->attachRole("Project Manager", $project->id);
	
		$result = RoleUser::where('user_id', $user->id)->where('role_id', $role->id)->get();
		$this->assertTrue(isset($result->items));
		var_dump($result);
	
	}

}