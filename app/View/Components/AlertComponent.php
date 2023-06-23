<?php

namespace App\View\Components;

use App\Enums\Status;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class AlertComponent extends Component
{
    public string $alertType;
    public string $alertMessage;
    public function __construct()
    {
        $alert = Session::get('alert');

        if(is_array($alert)) {
            if(array_key_exists(Status::SUCCESS,$alert)) {
                $this->alertType = 'success';
                $this->alertMessage = $alert[Status::SUCCESS];
            } else if(array_key_exists(Status::ERROR, $alert)) {
                $this->alertType = 'error';
                $this->alertMessage = $alert[Status::ERROR];
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert-component');
    }
}
