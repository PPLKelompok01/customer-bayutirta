<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\KonsultasiUser;
use App\Models\Konsultasi;
use Illuminate\Support\Facades\Storage;

class KonsultasiController extends Controller
{
    public function index()
    {
        return view('konsultasi');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:konsultasi_users',
            'phone' => 'nullable|string|max:15',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = KonsultasiUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $this->guard()->login($user);

        return redirect('konsultasi/dashboard');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->guard()->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect('konsultasi/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak valid.',
        ]);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/konsultasi');
    }

    public function showLoginForm()
    {
        if ($this->guard()->check()) {
            return redirect('konsultasi/dashboard');
        }
        return view('konsultasi.login');
    }

    public function showRegisterForm()
    {
        if ($this->guard()->check()) {
            return redirect('konsultasi/dashboard');
        }
        return view('konsultasi.register');
    }

    public function dashboard()
    {
        $user = $this->guard()->user();
        $konsultasis = $user->konsultasis()->orderBy('created_at', 'desc')->get();
        
        $stats = [
            'total' => $konsultasis->count(),
            'selesai' => $konsultasis->where('status', 'selesai')->count(),
            'diproses' => $konsultasis->whereIn('status', ['menunggu', 'diproses'])->count(),
        ];
        
        return view('konsultasi.dashboard', compact('konsultasis', 'stats'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'perangkat' => 'required|string|max:255',
            'masalah' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'urgensi' => 'required|in:rendah,sedang,tinggi',
        ]);
        
        $data = $request->only(['kategori', 'perangkat', 'masalah', 'urgensi']);
        $data['user_id'] = $this->guard()->id();
        
        // Handle file upload with Base64 encoding
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $image = $request->file('foto');
            $imageData = base64_encode(file_get_contents($image->getRealPath()));
            $mimeType = $image->getMimeType();
            
            // Store as data URL format: data:{mime};base64,{data}
            $data['foto_base64'] = "data:{$mimeType};base64,{$imageData}";
            
            // Also store in file system for backward compatibility
            $path = $request->file('foto')->store('konsultasi-images', 'public');
            $data['foto'] = $path;
        }
        
        Konsultasi::create($data);
        
        return redirect()->route('konsultasi.dashboard')
            ->with('success', 'Konsultasi berhasil dikirim. Tim kami akan segera merespons.');
    }

    /**
     * Get the guard to be used for konsultasi authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('konsultasi');
    }
} 