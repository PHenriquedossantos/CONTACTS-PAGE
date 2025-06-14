<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Contracts\Pagination\Paginator;

class ContactService
{
	public function list(int $_PER_PAGE = 15): Paginator
	{
		return Contact::query()
			->orderBy('created_at', 'desc')
			->paginate($_PER_PAGE);
	}
	
	public function create(array $_DATA): Contact
	{
		return Contact::create($_DATA);
	}

	public function find(int $_ID): Contact
	{
		return Contact::findOrFail($_ID);
	}
	
	public function update(int $_ID, array $_DATA): Contact
	{
		$_CONTACT = $this->find($_ID);
		$_CONTACT->update($_DATA);
		return $_CONTACT;
	}
	
	public function delete(int $_ID): void
	{
		$_CONTACT = $this->find($_ID);
		$_CONTACT->delete();
	}
}
