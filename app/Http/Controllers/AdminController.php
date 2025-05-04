<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Admin;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category' , compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;

        $category->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Category Added Successfully');


        return redirect()->back();
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Category Deleted Successfully');
        return redirect()->back();
    }

    public function edit_category($id)
    { 
        $data = Category::find($id);
        
        return view('admin.edit_category',compact('data'));

    }

    public function update_category(Request $request,$id){
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Category Updated Successfully');
        return redirect('/view_category');

    }

    public function add_product()
    {
        $category = Category::all();

        return view('admin.add_product',compact('category'));

    }
    public function upload_product(Request $request)
         {
          $data = new Product;
          $data->title = $request->title;
          $data->description = $request->description;
          $data->price = $request->price;
          $data->quantity = $request->qty;
          $data->category = $request->category;

          $image = $request->image;
          if($image)

          {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);

            $data->image = $imagename;
          }

          $data->save();
          toastr()->timeOut(5000)->closeButton()->addSuccess('Book Added Successfully');
          return redirect()->back();
         }

         public function view_product()
         {
            $product = Product::all();
            return view('admin.view_product', compact('product'));

         }

         public function delete_product($id){
            $data = Product::find($id);
            $image_path = public_path('products/'.$data->image);

            if(file_exists($image_path))

            {
                unlink($image_path);

            }
            $data->delete();
            toastr()->timeOut(5000)->closeButton()->addSuccess('Book Deleted Successfully');
            return redirect()->back();
         }

         public function update_product($id)
         {
            $data = Product::find($id);
            $category = Category::all();
            return view('admin.update_page',compact('data','category'));
         }

         public function edit_product(Request $request,$id)
         {
            $data = Product::find($id);
            $data->title = $request->title;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->quantity = $request->quantity;
            $data->category= $request->category;
            $image = $request->image;

            if($image)
            {
                $imagename =time().'.'.$image->getClientOriginalExtension();
                $request->image->move('products',$imagename);
                $data->image = $imagename;

            }
            $data->save();
            toastr()->timeOut(5000)->closeButton()->addSuccess('Updated Successfully');
            return redirect('/view_product');
         }

         public function book_search(Request $request){
            $search = $request->search;

            $product = Product::where('title','like','%'.$search.'%')->orwhere('category','like','%'.$search.'%')->get();

            return view('admin.view_product',compact('product'));

         }

         public function view_order()
         {
            $data = Order::all();

            return view('admin.order',compact('data'));

         }
         public function on_the_way($id)

         {
            $data = Order::find($id);
            $data->status = 'on the way';
            $data->save();
            return redirect('/view_orders');
         }

         public function delivered($id)

         {
            $data = Order::find($id);
            $data->status = 'Delivered';
            $data->save();
            return redirect('/view_orders');
         }

         public function print_pdf($id)
         {
            $data = Order::find($id);
            $pdf = Pdf::loadView('admin.invoice',compact('data'));
            return $pdf->download('invoice.pdf');

           


         }

   public function storeBook(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    // Redirect to books page with the E-book filter if the category is E-book
    if ($product->category == 'E-book') {
        return redirect()->route('books', ['category' => 'E-book'])
                         ->with('success', 'E-book added successfully!');
    }


   
return redirect()->route('books')->with('success', 'Book added successfully!'); 
   
}

public function storeAudio(Request $request) {
   $product = new Product();
   $product->title = $request->title;
   $product->price = $request->price;
   $product->category = $request->category;
   
   // Handle image upload
   if ($request->hasFile('image')) {
       $image = $request->file('image');
       $imageName = time().'.'.$image->getClientOriginalExtension();
       $image->move(public_path('products'), $imageName);
       $product->image = $imageName;
   }

   $product->save();

   // Redirect to books page with the E-book filter if the category is E-book
   

   if ($product->category == 'E-audio') {
     return redirect()->route('eaudio', ['category' => 'E-audio'])
                      ->with('success', 'E-audio added successfully!');
 }


  
return redirect()->route('eaudio')->with('success', 'Book added successfully!'); 
  
}


public function storeNotes(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'notes') {
      return redirect()->route('notes', ['category' => 'notes'])
                       ->with('success', 'notes added successfully!');
  }
 
 return redirect()->route('usedbook')->with('success', 'Book added successfully!'); 
   
 }
 
 public function storeBookMela(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'bookmela') {
      return redirect()->route('bookmela', ['category' => 'bookmela'])
                       ->with('success', 'bookmela added successfully!');
  }
 
 return redirect()->route('bookmela')->with('success', 'Book added successfully!'); 
   
 }
 
 public function storeIslamic(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'islamic') {
      return redirect()->route('islamic', ['category' => 'islamic'])
                       ->with('success', 'islamic added successfully!');
  }
 
 return redirect()->route('islamic')->with('success', 'Islamic Book added successfully!'); 
   
 }

 public function storeBengali(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'bengali') {
      return redirect()->route('bengali', ['category' => 'bengali'])
                       ->with('success', 'bengali added successfully!');
  }
 
 return redirect()->route('bengali')->with('success', 'Bengali Book added successfully!'); 
   
 }

 public function storeChildrenBooks(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'childrenbooks') {
      return redirect()->route('childrenbooks', ['category' => 'childrenbooks'])
                       ->with('success', 'childrenbooks added successfully!');
  }
 
 return redirect()->route('childrenbooks')->with('success', 'ChildrenBooks added successfully!'); 
   
 }

 public function storeHistorical(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'historical') {
      return redirect()->route('historical', ['category' => 'historical'])
                       ->with('success', 'historical added successfully!');
  }
 
 return redirect()->route('historical')->with('success', 'Historical Book added successfully!'); 
   
 }

 public function storeAdventure(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'adventure') {
      return redirect()->route('adventure', ['category' => 'adventure'])
                       ->with('success', 'adventure added successfully!');
  }
 
 return redirect()->route('adventure')->with('success', 'Adventure Book added successfully!'); 
   
 }

 public function storeThriller(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'thriller') {
      return redirect()->route('thriller', ['category' => 'thriller'])
                       ->with('success', 'thriller added successfully!');
  }
 
 return redirect()->route('thriller')->with('success', 'Thriller Book added successfully!'); 
   
 }

 public function storeBiography(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'biography') {
      return redirect()->route('biography', ['category' => 'biography'])
                       ->with('success', 'biography added successfully!');
  }
 
 return redirect()->route('biography')->with('success', 'Biography Book added successfully!'); 
   
 }

 public function storeMystery(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'mystery') {
      return redirect()->route('mystery', ['category' => 'mystery'])
                       ->with('success', 'mystery added successfully!');
  }
 
 return redirect()->route('mystery')->with('success', 'Mystery Book added successfully!'); 
   
 }

 public function storeSelfhelp(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'selfhelp') {
      return redirect()->route('selfhelp', ['category' => 'selfhelp'])
                       ->with('success', 'selfhelp added successfully!');
  }
 
 return redirect()->route('selfhelp')->with('success', 'Selfhelp Book added successfully!'); 
   
 }

 public function storeHorror(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'horror') {
      return redirect()->route('horror', ['category' => 'horror'])
                       ->with('success', 'horror added successfully!');
  }
 
 return redirect()->route('horror')->with('success', 'Horror Book added successfully!'); 
   
 }

 public function storeGoosebumps(Request $request) {
    $product = new Product();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->category = $request->category;
    
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }
 
    $product->save();
 
    // Redirect to books page with the E-book filter if the category is E-book
    
 
    if ($product->category == 'goosebumps') {
      return redirect()->route('goosebumps', ['category' => 'goosebumps'])
                       ->with('success', 'goosebumps added successfully!');
  }
 
 return redirect()->route('goosebumps')->with('success', 'Goosebumps Book added successfully!'); 
   
 }

 public function showUserProfile($id)
{
    $user = User::find(auth()->id()); // Fetch logged-in user

    return view('admin.user.profile', compact('user'));
}

public function updateUser(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
    ]);

    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
    ]);

    return redirect()->back()->with('success', 'User updated successfully!');
}
 

public function showUsers()
{
    $users = User::all();
    return view('admin.users', compact('users'));
}

 

public function register()
{
   $user = User::all();

   return view('admin.register1',compact('user'));

}


public function delete_register($id){
    $user = User::find($id);
    $user->delete();
    toastr()->timeOut(5000)->closeButton()->addSuccess('User Deleted Successfully');
    return redirect()->back();
}









}
