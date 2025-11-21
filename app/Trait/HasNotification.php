<?php

namespace App\Trait;

trait HasNotification
{
    public function sweetSuccess($message)
    {
        $this->dispatch('sweet.success', message: $message);
    }

    public function sweetError($message)
    {
        $this->dispatch('sweet.error', message: $message);
    }

    public function sweetWarning($message)
    {
        $this->dispatch('sweet.warning', message: $message);
    }
    //block delete
    public function sweetConfirmDelete($message)
    {
        $this->dispatch('sweet.confirm-delete', message: $message);
    }
    public function sweetDeleteSuccess($message)
    {
        $this->dispatch('sweet.delete-success', message: $message);
    }
    public function sweetErrorSystem($message)
    {
        $this->dispatch('sweet.error-system', message: $message);
    }
    public function sweetToastSuccess($message)
    {
        $this->dispatch('sweet.toast-success', message: $message);
    }

    public function sweetToastError($message)
    {
        $this->dispatch('sweet.toast-error', message: $message);
    }

    public function sweetToastInfo($message)
    {
        $this->dispatch('sweet.toast-info', message: $message);
    }

    public function sweetToastWarning($message)
    {
        $this->dispatch('sweet.toast-warning', message: $message);
    }

}