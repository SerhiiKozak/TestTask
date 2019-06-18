<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Contacts;
use App\Leads;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Exception;

class ContactsController extends Controller
{
    public function index()
    {
      if (Auth::check())
      {
        $contacts = Contacts::all();
        return view('contacts', compact('contacts'));
      }
      else
      {
        return redirect('login');
      }
    }

    public function show($id)
    {
      if (Auth::check())
      {
        $leads = Leads::where('contact_id', $id)->get();
        $contact = Contacts::find($id);
        return view('contact', compact('contact','leads'));
      }
      else
      {
        return redirect('login');
      }
    }

    public function form($id)
    {
      try {
        $this->HavePermissions();
        $contObj = new Contact();
        if ($id != 0) {
          $contact = $contObj->set($id);
          return view('contact_form', compact('contact'));
        } else {
          $contact = $contObj->contact;
          return view('contact_form', compact('contact') );
        }

      } catch (Exception $e) {
        $message = $e->getMessage();
        return redirect()->back()->with('message', $message);
      }

    }

    public function add(Request $request)
    {
      try {
        $this->HavePermissions();

        $this->validate($request,[
          'first_name' => 'required',
          'last_name'  => 'required',
          'cell'       => 'required',
          'comment'    => 'required'
        ]);

        $contact = new Contact([
          'first_name' => $request->get('first_name'),
          'last_name'  => $request->get('last_name'),
          'cell'       => $request->get('cell'),
          'comment'    => $request->get('comment'),
        ]);

        $contact->save();
        return redirect()->route('contacts');
      } catch (Exception $e) {
        $message = $e->getMessage();
        return redirect()->back()->with('message', $message);
      }

    }

    public function edit(Request $request, $id)
    {
      try {
        $this->HavePermissions();

        $this->validate($request,[
          'first_name' => 'required',
          'last_name'  => 'required',
          'cell'       => 'required',
          'comment'    => 'required'
        ]);
        $contact = Contact::find($id);
        $contact->first_name = $request->get('first_name');
        $contact->last_name  = $request->get('last_name');
        $contact->cell       = $request->get('cell');
        $contact->comment    = $request->get('comment');
        $contact->save();
        return redirect()->route('contacts');
      } catch (Exception $e) {
        $message = $e->getMessage();
        return redirect()->back()->with('message', $message);
      }

    }

    public function destroy(Request $request, $id)
    {
      try {
        $this->HavePermissions();
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contacts');
      } catch (Exception $e) {
        $message = $e->getMessage();
        return redirect()->back()->with('message', $message);
      }

    }

    public function migrate()
    {
      try{
        $this->HavePermissions();
      } catch (Exception $e) {
        $message = $e->getMessage();
        return redirect()->back()->with('message', $message);
      }

    }

    public function HavePermissions()
    {
      if (Auth::user()->role == 2) {
        throw new Exception('Sorry but you do not have permissions for this action.');
      }
    }
}
