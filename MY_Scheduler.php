<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Library for the CodeIgniter framework.
 *
 * @package		CodeIgniter
 * @version		1.0
 * @author 		Kamaro Lambert <kamaroly@gmail.com>
 * @description CodeIgniter library to helpe you create scheduler tasks on windows  
 * @copyright    	Copyright (c) Sept 2013, Kamaro Lambert
 * @link 		http://huguka.com/
 * @license             GPL/MIT
 * @example     
 * $this->load->library('MY_scheduler');  //Loading library
 * $this->my_scheduler->create_task($name,$frequency,$program,$time,$days);  //Creating a new Scheduler tasks
 * $this->my_scheduler->delete_task($name); /                /Delete a scheduler tasks by it's name
 */

  
Class MY_Scheduler 
{
	var $CI;
	function __construct()
	{
		
			$this->CI =& get_instance();
	}
 /**
  * @author Kamaro Lambert
  * @name   create_task()
  * @method to add task schedule in windows using php
  * @param String $frequency -Frequency for which the program follow E.g DAILY,MONTHLY,WEEKLY
  * @param string $name      -name of the Task E.g "My Tasks"
  * @param string $program   - “C:\RunMe.bat” 
  * @param time $time        -Time in Hour and minutes E.g 09:00
  * @param $days             -MON,TUE,WED,THU,FRI
  * @example $this->schedule('DAILY','My Task','C:RunMe.bat',09:00);
  * @todo add option to add start and end date for the scheduler
  * 
  */

 function create_task($name=null,$frequency=null,$program=null,$time=null,$days=array())
 {
 	echo $command='SchTasks /Create /SC '.$frequency.' /TN "'.$name.'" /TR "'.$program.'" /St '.$time;
 	
 	//SchTasks /Create /SC DAILY /TN “My Task” /TR “C:RunMe.bat” /ST 09:00
 	//SchTasks /Create /SC MONTHLY /D 1 /TN “My Task” /TR “C:RunMe.bat” /ST 14:00
 	//SchTasks /Create /SC WEEKLY /D MON,TUE,WED,THU,FRI /TN “My Task” /TR
 	$output = exec($command);
 
 	
 }
 
 /**
  * @author Kamaro Lambert
  * @method to modify existing tasks
  * @param String $frequency -Frequency for which the program follow E.g DAILY,MONTHLY,WEEKLY
  * @param string $name      -name of the Task E.g "My Tasks"
  * @param string $program   - “C:\RunMe.bat” 
  * @param time $time        -Time in Hour and minutes E.g 09:00
  * @param $days             -MON,TUE,WED,THU,FRI
  * @example $this->schedule('My Task','DAILY','C:RunMe.bat',09:00);
  * @todo add option to use username and password
  * ******************************************************************************************
  */
 
 function modify_task($name=null,$frequency=null,$program=null,$time=null,$days=array())
 {
 	$command='SchTasks /Change /TN "'.$name.'"';
 	
 	
 	
 	//Does user want to change the program to execute?
 	if($frequency!=null)
 	{
 		$command.=' /TR "'.$program.'" ';
 	}

 	//Does user want to the time?
 	if($frequency!=null)
 	{
 		$command.=' /ST '.$time;
 	}
 	echo $command;
 	$output = exec($command);
 	//SchTasks /Change /TN “My Task” /ST 14:00
 }
 
 /**
  * @author Kamaro Lambert
  * @method to delete task created
  * @name   delete_task()
  * @param  array $task_name      -name of the Task E.g "My Tasks"
  * @return boolean
  * * ***********************************************************
  */
 function delete_task($task_name=null)
 {
 	echo $command='SchTasks /Delete /TN "'.$task_name.'" /F';
 	
 	//SchTasks /Delete /TN “My Task”
  	$output = exec($command);
 }
 
 /**
  * @author Kamaro Lambert
  * @method to modify existing tasks
  * @name   bulk_task_creation
  * @param String $frequency -Frequency for which the program follow E.g DAILY,MONTHLY,WEEKLY
  * @param string $name      -name of the Task E.g "My Tasks"
  * @param string $program   - “C:\RunMe.bat”
  * @param time $time        -Time in Hour and minutes E.g 09:00
  * @param $days             -MON,TUE,WED,THU,FRI
  * @example $this->bulk_task_creation($array());
  * @todo allow the scheduler to be created in bulk by passing an array
  * ******************************************************************************************
  */
 function bulk_task_creation()
 {
 	//SchTasks /Create /SC DAILY /TN “Backup Data” /TR “C:Backup.bat” /ST 07:00
 	//SchTasks /Create /SC WEEKLY /D MON /TN “Generate TPS Reports” /TR “C:GenerateTPS.bat” /ST 09:00
 	//SchTasks /Create /SC MONTHLY /D 1 /TN “Sync Database” /TR “C:SyncDB.bat” /ST 05:00
 }
 
 /**
  * @author Kamaro Lambert
  * @method to modify existing tasks
  * @param String $frequency -Frequency for which the program follow E.g DAILY,MONTHLY,WEEKLY
  * @param string $name      -name of the Task E.g "My Tasks"
  * @param string $program   - “C:\RunMe.bat”
  * @param time $time        -Time in Hour and minutes E.g 09:00
  * @param $days             -MON,TUE,WED,THU,FRI
  * @example $this->schedule('DAILY','My Task','C:RunMe.bat',09:00);
  * ******************************************************************************************
  */
 function run_task($taskname)
  {
 	
 	//SCHTASKS /Run [/S <system> [/U <username> [/P [<password>]]]] /TN <taskname>
 	
  }
}
