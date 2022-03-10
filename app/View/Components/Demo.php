<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Demo extends Component {

  /**
   * @var
   */
  public $demo;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($demo){
    $this->demo = $demo;
  }


  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render(){
    return view('components.demo');
  }
}
