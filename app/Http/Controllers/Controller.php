<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function blogindex(Request $request){
        $perPage = 10; // Number of rows per page
        $page = $request->input('page', 1);
        $blogs = Blogs::orderBy('id', 'desc')->paginate($perPage, ['*'], 'page', $page);
        return view('admin.blogs',compact('blogs'));

    }
    public function blogCreate()
    {
        return view('admin.blog-create');
    }
    public function updateStatus(Request $req){
            $id=  $req->id;
            $blog = Blogs::where('id',$id)->first();
            $blog->status =$req->status;
            if ($blog->save()) {
                echo 'success';
            } else {
               echo 'error';
            }
    }
    public function blogSubmit(Request $req)
{
    $req->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg|max:10000',
        'title' => 'required|string|max:255',
        'description' => 'required',
        'date' => 'required',
    ]);

    // Handle image file upload
    if ($req->hasFile('image')) {
        $imgName = time() . '.' . $req->image->extension();
        $req->image->move(public_path('blog_images'), $imgName);
    } else {
        // Handle the case where no image is provided
        $imgName = null;
    }
    $dateString = $req->date; 
    $dateTime = \DateTime::createFromFormat('d/m/y', $dateString);
    $date = $dateTime->format('Y-m-d');
    // Create a new blog model instance
    $blog = new Blogs();
    $blog->image = $imgName;
    $blog->title = $req->title;
    $blog->description = $req->description;
    $blog->publish_date = $date;
    $blog->status = 0; 

    
    if ($blog->save()) {
        return redirect()->back()->with('success', 'Blog entry saved successfully.');
    } else {
        return redirect()->back()->with('danger', 'Failed to save the blog entry.');
    }
}

 public function blogList()
 {
    $blog = Blogs::orderBy('id', 'desc')->get();
    return view('admin.blog-list',['blogs'=>$blog]);
 }
 
 public function blogEdit($id) 
 {
    $blog = Blogs::where('id',$id)->first();
   return view('admin.blog-edit',['blogs'=>$blog]);
 }
 public function blogView($id) 
 {
    $blog = Blogs::where('id',$id)->first();
   return view('admin.blog-view',['blogs'=>$blog]);
 }
 public function blogUpdate(Request $req, $id)
 {
    
    $req->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        'title' => 'required|string|max:255',
        'description' => 'required',
        'date' => 'required',
    ]);
    $blog = Blogs::where('id',$id)->first();
  
    if ($req->hasFile('image')) {
        $imgName = time() . '.' . $req->image->extension();
        $req->image->move(public_path('blog_images'), $imgName);
        $blog->image = $imgName;
    } 
    if($req->status == NULL){
        $status = 0;
    }else
    {
        $status = 1;
    }
    $dateString = $req->date; 
    $dateTime = \DateTime::createFromFormat('d F Y', $dateString);
    $date = $dateTime->format('Y-m-d');
    $blog->title = $req->title;
    $blog->description = $req->description;
    $blog->publish_date = $date;
    $blog->status =$status; 

    
    if ($blog->save()) {
        return redirect('/admin/blog-list')->with('success', 'Blog update successfully.');
    } else {
        return redirect()->back()->with('danger', 'Failed to save the blog entry.');
    }
 }
 public function blogDelete($id)
 {
    $blog = Blogs::where('id',$id)->first();
    $blog->delete();
    return redirect()->back()->with('success', 'Blog deleted.');
 }


 public function contactIndex(Request $request) 
 {
    $perPage = 10; // Number of rows per page
    $page = $request->input('page', 1);
    $search = $request->input('search');
    $query = DB::table('contact_tbl')->orderBy('id', 'desc');
    if ($search) {
        $query->where('name', 'like', "%$search%")
        ->orWhere('email', 'like', "%$search%")
        ->orWhere('phone', 'like', "%$search%")
        ->orWhere('subject', 'like', "%$search%");
    }
    $contactData  =  $query ->paginate($perPage, ['*'], 'page', $page);
    return view('admin.contact', compact('contactData'));
 }
    public function contactView($id)
    {
        $contacts = DB:: table('contact_tbl')->where('id',$id)->first();
        return view('admin.contact-view',['contact'=>$contacts]);

    }
}
