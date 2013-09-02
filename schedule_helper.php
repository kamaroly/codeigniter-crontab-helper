<?php
/************************************************************
 * @author Kamaro Lambert                                   *
 * @name Schedule                                           *
 * @description CodeIgniter Schedule helper for windows     *
 *************************************************************/
  
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
  * 
  */

 function create_task($name=null,$frequency=null,$program=null,$time=null,$days=array())
 {
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
  * @example $this->schedule('DAILY','My Task','C:RunMe.bat',09:00);
  * ******************************************************************************************
  */
 function modify_task($name=null,$frequency=null,$program=null,$time=null,$days=array())
 {
 	//SchTasks /Change /TN “My Task” /ST 14:00
 }
 
 /**
  * @author Kamaro Lambert
  * @method to delete task created
  * @name   delete_task()
  * @param  array $names      -name of the Task E.g "My Tasks"
  * @return boolean
  * * ***********************************************************
  */
 function delete_task($schedule_name=null)
 {
 	//SchTasks /Delete /TN “My Task”
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
  * @example $this->schedule('DAILY','My Task','C:RunMe.bat',09:00);
  * ******************************************************************************************
  */
 function bulk_task_creation()
 {
 	//SchTasks /Create /SC DAILY /TN “Backup Data” /TR “C:Backup.bat” /ST 07:00
 	//SchTasks /Create /SC WEEKLY /D MON /TN “Generate TPS Reports” /TR “C:GenerateTPS.bat” /ST 09:00
 	//SchTasks /Create /SC MONTHLY /D 1 /TN “Sync Database” /TR “C:SyncDB.bat” /ST 05:00
 }