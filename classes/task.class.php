<?php

class Task
{
  private $task = [];
  private $id;
  public $title;
  public $priority;
  public $date;
  public $user_name;

  public function __construct($title = "", $priority = "",$username="",$due_date="")
  {
    $this->date = $due_date;
    $this->user_name = $username;
    $this->id = rand(10, 1000);
    $this->title = $title;
    $this->priority = $priority;
  }
  static function get_Tasks_divided_pr()
  {
    $tasks = json_decode(file_get_contents('../Tasks/tasks.json'), true);
    $filter_tasks = ["high" => [], "med" => [], "low" => []];
    foreach ($tasks as $task) {
  
      if ($task['priority'] == 'high') {
        $filter_tasks["high"][] = $task;
      }
      if ($task['priority'] == 'med') {
        $filter_tasks["med"][] = $task;
      }
      if ($task['priority'] == 'low') {
        $filter_tasks["low"][] = $task;
      }
    }


    return $filter_tasks;

  }
  static function get_Tasks()
  {
    return $tasks = json_decode(file_get_contents('../Tasks/tasks.json'), true);
  }
  public function get_task($id)
  {
    $tasks = self::get_Tasks();
    foreach ($tasks as $i => $task) {

      if ($task['id'] == $id) {
        return $task;
      }
    }
  }
  static function put_json($tasks)
  {
    file_put_contents('../Tasks/tasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
  }

  public function add_task()
  {
    $this->task['name']=$this->user_name;
    $this->task['title'] = $this->title;
    $this->task['id'] = $this->id;
    $this->task['priority'] = $this->priority;
    $this->task['date'] = $this->date;
    $tasks = self::get_Tasks();
    $tasks[] = $this->task;
    self::put_json($tasks);
  }



  function Edit_Task($id, $data)
  {
    $tasks = self::get_Tasks();
    foreach ($tasks as $i => $task) {
      if ($task['id'] == $id) {
        $tasks[$i] = array_merge($task, $data);
      }
    }

    self::put_json($tasks);

  }



  function delete_task($id)
  {
    $tasks = self::get_Tasks();
    foreach ($tasks as $i => $task) {
      if ($task['id'] == $id) {
        array_splice($tasks, $i, 1);

      }

    }
    self::put_json($tasks);
  }




}