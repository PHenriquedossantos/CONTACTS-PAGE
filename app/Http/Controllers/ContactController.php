<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
	private ContactService $_CONTACT_SERVICE;
	
	public function __construct(ContactService $_CONTACT_SERVICE)
	{
		$this->_CONTACT_SERVICE = $_CONTACT_SERVICE;
		//$this->middleware('auth')->except(['index', 'show']);
	}
	
	public function index()
	{
		####
		# return blade contact.index
		try {
			$_CONTACTS = $this->_CONTACT_SERVICE->list();
			return view('contacts.index', compact('_CONTACTS'));
		} catch (\Throwable $_EX) 
		{
			Log::error("Erro ao listar contatos: {$_EX->getMessage()}");
			return back()->withErrors(config('messages.contact.list_error'));
		}
	}
	
	public function create()
	{
		return view('contacts.create');
	}
	
	public function store(StoreContactRequest $request)
	{
		####
		# Capture the form inputs
		$_IN_NAME    = $request->input('name');
		$_IN_CONTACT = $request->input('contact');
		$_IN_EMAIL   = $request->input('email');
		
		####
		# Initiate logic for contact creation with error handling
		try {
			$this->_CONTACT_SERVICE->create([
				'name'    => $_IN_NAME,
				'contact' => $_IN_CONTACT,
				'email'   => $_IN_EMAIL,
			]);
			return redirect()->route('contacts.index')->with('success', config('messages.contact.create_success'));
		} catch (\Throwable $_EX) 
		{
			Log::error("Erro ao criar contato: {$_EX->getMessage()}");
			return back()->withErrors(config('messages.contact.create_error'))->withInput();
		}
	}
	
	public function show(int $_ID)
	{
		####  
		# Display individual contact details by ID with error handling
		try {
			$_CONTACT = $this->_CONTACT_SERVICE->find($_ID);
			return view('contacts.show', compact('_CONTACT'));
		} catch (ModelNotFoundException $_EX) 
		{
			return redirect()->route('contacts.index')->withErrors(config('messages.contact.not_found'));
		} catch (\Throwable $_EX) 
		{
			Log::error("Erro ao exibir contato {$_ID}: {$_EX->getMessage()}");
			return redirect()->route('contacts.index')->withErrors(config('messages.contact.show_error'));
		}
	}
	
	public function edit(int $_ID)
	{
		try {
			$_CONTACT = $this->_CONTACT_SERVICE->find($_ID);
			return view('contacts.edit', compact('_CONTACT'));
		} catch (ModelNotFoundException $_EX)
		{
			return redirect()->route('contacts.index')->withErrors(config('messages.contact.not_found'));
		} catch (\Throwable $_EX) 
		{
			Log::error("Erro ao carregar edição do contato {$_ID}: {$_EX->getMessage()}");
			return redirect()->route('contacts.index')->withErrors(config('messages.contact.edit_load_error'));
		}
	}
	
	public function update(UpdateContactRequest $request, int $_ID)
	{
		####
		# Capture the form inputs
		$_IN_NAME    = $request->input('name');
		$_IN_CONTACT = $request->input('contact');
		$_IN_EMAIL   = $request->input('email');
		
		try {
			$this->_CONTACT_SERVICE->update($_ID, [
				'name'    => $_IN_NAME,
				'contact' => $_IN_CONTACT,
				'email'   => $_IN_EMAIL,
			]);
			return redirect()->route('contacts.show', $_ID)->with('success', config('messages.contact.update_success'));
		} catch (ModelNotFoundException $_EX) 
		{
			return redirect()->route('contacts.index')->withErrors(config('messages.contact.not_found_update'));
		} catch (\Throwable $_EX) 
		{
			Log::error("Erro ao atualizar contato {$_ID}: {$_EX->getMessage()}");
			return back()->withErrors(config('messages.contact.update_error'))->withInput();
		}
	}
	
	public function destroy(int $_ID)
	{
		try {
			$this->_CONTACT_SERVICE->delete($_ID);
			return redirect()->route('contacts.index')->with('success', config('messages.contact.delete_success'));
		} catch (ModelNotFoundException $_EX) 
		{
			return redirect()->route('contacts.index')->withErrors(config('messages.contact.not_found_delete'));
		} catch (\Throwable $_EX) 
		{
			Log::error("Erro ao excluir contato {$_ID}: {$_EX->getMessage()}");
			return redirect()->route('contacts.index')->withErrors(config('messages.contact.delete_error'));
		}
	}
}
