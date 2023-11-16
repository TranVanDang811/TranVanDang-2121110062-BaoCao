<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::where([['status', '!=', '0'], ['replay_id', '=', 0]])

            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'Danh sách liên hệ';
        return view('backend.contact.index', compact('contacts', 'title'));
    }
    public function trash()
    {
        $contacts = Contact::where('status', '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'Thùng rác liên hệ';
        return view('backend.contact.trash', compact('contacts', 'title'));
    }
    public function show(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()
                ->route('contact.trash')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        return view('backend.contact.show', compact('contact'));
    }
    public function replay(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()
                ->route('contact.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        return view('backend.contact.replay', compact('contact'));
    }
    public function postreplay(Request $request, string $id)
    {
        $contact_old = Contact::find($id);
        if ($contact_old == null) {
            return redirect()
                ->route('contact.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $contact_old->status = 1;
        $contact_old->updated_at = date('Y-m-d H:i:s');
        $contact_old->updated_by = Auth::id() ?? 1;
        $contact_old->save();
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->created_by = Auth::id() ?? 1;
        $contact->replay_id = $id;
        $contact->status = 2;
        $contact->save();
        return redirect()
            ->route('contact.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thành Công']);
    }
    public function delete(string $id)
    {

        $contact = Contact::find($id);
        if ($contact == NULL) {
            return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $contact->status = 0;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->save();
        return redirect()->route('contact.index')->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin vào thùng rác thành công']);
    }
    public function restore($id)
    {
        $contact = Contact::find($id);
        if ($contact == NULL) {
            return redirect()->route('contact.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $contact->status = 2;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->save();
        return redirect()->route('contact.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công']);
    }
    public function destroy($id)
    {

        $contact = Contact::find($id);
        if ($contact == NULL) {
            return redirect()->route('contact.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $contact->delete();
        return redirect()->route('contact.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

    }
    public function status($id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()
                ->route('contact.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $contact->status = ($contact->status==1)?2:1;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
        $contact->save();
        return redirect()
            ->route('contact.index')
            ->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
    }
}
