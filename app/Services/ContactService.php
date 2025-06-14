<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ContactService
{
	/**
	 * Retorna contatos paginados, opcionalmente filtrados por search.
	 *
	 * @param int    $_PER_PAGE
	 * @param string $_SEARCH
	 * @return Paginator
	 */
	public function list(int $_PER_PAGE = 15, string $_SEARCH = ''): Paginator
	{
		$query = Contact::query();
		if (! empty($_SEARCH)) 
		{
			$query->where(function($q) use($_SEARCH) {
				$q->where('name',    'like', "%{$_SEARCH}%")
					->orWhere('contact','like', "%{$_SEARCH}%")
					->orWhere('email',   'like', "%{$_SEARCH}%");
			});
		}
		return $query
			->orderBy('created_at', 'desc')
			->paginate($_PER_PAGE)
			->withQueryString();
	}
	
	public function create(array $_DATA): Contact
	{
		$_DATA['user_id'] = Auth::id();
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
