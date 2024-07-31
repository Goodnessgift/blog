<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    //
    // public function index() {
    //     return view('homepage');
    // }


    public function index()
    {
        if (Auth::check()) {
            $myposts = Blog::where('deleted', 0)->orderBy('blog_views', 'desc')->take(12)->get();
            $plus = 0;
            return view('homepage', compact('myposts', 'plus'));
        } else {
            return redirect()->route('login');
        }
    }

    public function createP()
    {
        if (Auth::check()) {
            return view('createpost');
        } else {
            return redirect()->route('login');
        }
    }


    public function postB(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make(
                $request->all(),
                [
                    'blog_title' => 'required|string|max:100',
                    'blog_details' => 'required|string|max:750',
                    'blog_tags' => 'required|string|max:750',
                    'blog_image' => 'required|image|mimes:jpeg, png,jpg,gif',
                ],
                [
                    'blog_title.required' => 'Enter your blog name!',
                    'blog_tags.required' => 'Enter your blog tag!',
                    'blog_details.required' => 'Fill up your details!',
                    'blog_image.required' => 'The image field is empty!',
                ]
            );

            if ($validator->fails()) {
                // $validator->errors();
                // return $validator->errors();
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $slug = str_replace(" ", "-", $request->blog_title);
            $newFilename = Str::random(32) . "." .
                $request->blog_image->getClientOriginalExtension();
            if ($request->blog_image->move('uploads/', $newFilename)) {
                # code...
            };
            $userid = Auth::user()->id;

            $brick2 = Blog::create([
                'blog_title' => $request->blog_title,
                'blog_details' => $request->blog_details,
                'blog_image' => $newFilename,
                'blog_tags' => $request->blog_tags,
                'blog_slug' => $slug,
                'UserId' => $userid,
            ]);

            if ($brick2) {
                return redirect()->route('home')->with('success', 'Blog Created Successfully');
            } else {
                return "Form Submission Failed";
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function viewpost($id)
    {
        $myposts = Blog::find($id);
        if ($myposts) {
            // Increment the blog_views by 1
            $myposts->increment('blog_views');
            return view('viewpost', ['post' => $myposts]);
        } else {
            return redirect()->back()->with('error', 'Post not found');
        }
    }
    public function changeP($id)
    {
        if(Auth::check()){
            $thispost = Blog::find($id);
            // return "Post id: ".$thispost->UserId." UserID: ".Auth::user()->id;
            if ($thispost->UserId == Auth::user()->id) {
                if ($thispost) {
                    return view('updatepost', ['blog' => $thispost]);
                } else {
                    return redirect()->back()->with('error', '');
                }
            } else {
                return redirect()->back()->with('error', 'You do not have permission to edit this blog');
            }
        }
    }

    public function allP()
    {
        $myposts = Blog::all();
        return view('allposts', compact('myposts'));
    }

    public function updateP(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'blog_title' => 'required|string|max:100',
                'blog_details' => 'required|string|max:750',
                'blog_tags' => 'required|string|max:750',
                'blog_image' => 'required|image|mimes:jpeg, png,jpg,gif',
            ],
            [
                'blog_title.required' => 'Enter your blog name!',
                'blog_tags.required' => 'Enter your blog tag!',
                'blog_details.required' => 'Fill up your details!',
                'blog_image.required' => 'The image field is empty!',
            ]
        );

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slug = str_replace(" ", "-", $request->blog_title);
        $newFilename = Str::random(32) . "." .
            $request->blog_image->getClientOriginalExtension();
        if ($request->blog_image->move('uploads/', $newFilename)) {
            # code...
        };

        $thisblog = Blog::find($request->id);
        if ($thisblog->UserId =! Auth::user()->id) {
            redirect()->back()->with('error', 'Please Login');
        } else {
            if ($thisblog) {
                $updateblog = $thisblog->update([
                    'blog_title' => $request->blog_title,
                    'blog_details' => $request->blog_details,
                    'blog_image' => $newFilename,
                    'blog_tags' => $request->blog_tags,
                    'blog_slug' => $slug,
                ]);

                if ($updateblog) {
                    return redirect()->route('home')->with('success', 'Blog Updated Successfully');
                } else {
                    return redirect()->back()->with('error', 'Update failed');
                }
            }
        }
    }
    public function loginP()
    {
        return view('login');
    }
    public function registerP()
    {
        return view('register');
    }
    public function postR(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'users_name' => 'required|string|max:100',
                'email' => 'required|email|max:30|unique:users',
                'password' => 'required|min:6',
            ],
            [
                'users_name.required' => 'Enter your  fullname!',
                'email.required' => 'Email is required!',
                'password.required' => 'Fill up your password!',
                'password.min' => 'Password must not exceed 20 characters',
            ]
        );

        if ($validator->fails()) {
            // $validator->errors();
            return $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $brick2 = User::create([
            'name' => $request->users_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        if ($brick2) {
            return redirect()->route('home')->with('success', 'Registration Successful');
        } else {
            return "Registration Failed";
        }
    }
    public function postL(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|max:30',
                'password' => 'required|min:6',
            ],
            [
                'email.required' => 'Email is required!',
                'password.required' => 'Fill up your password!',
                'password.min' => 'Password must not exceed 20 characters',
            ]
        );

        if ($validator->fails()) {
            // $validator->errors();
            return $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->withSuccess('Welcome Back!');
        } else {
            return back()->withErrors(
                [
                    'email' => 'Either your email adress or password is incorrect',
                ]
            )->onlyInput('email');
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
    public function getallposts(){
        // if (Auth::check()) {
            $myposts = Blog::all();
            return response()->json([
                'status' => 200,
                'posts' => $myposts,
            ]);
        // } else {
        //     return response()->json([
        //         'status' => 201,
        //         'message' => "Please login"
        //     ]);
        // }
    }

    public function apiregister(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required|string|max:100',
                'email' => 'required|email|max:30|unique:users',
                'password' => 'min:8|string',
            ],
            [
                'username.required' => 'Enter your username!',
                'email.required' => 'Fill up your email!',
                'password.required' => 'Enter your password!',
            ]
        );

        if ($validator->fails()) {
            // $validator->errors();
            return $validator->errors();
        }


        $signupsubmission = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        if ($signupsubmission) {
            return response()->json([
                'status' => 200,
                'message' => 'Account created'
            ]);
        } else {
            return response()->json([
                'status' => 201,
                'message' => 'Account creation failed.'
            ]);
        }
    }
}
