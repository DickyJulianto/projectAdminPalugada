public function login(Request $request)
    {
        // 1. Validasi input, termasuk captcha
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);

        // Hapus 'captcha' dari array agar tidak ikut dalam proses autentikasi
        unset($credentials['captcha']);

        // 2. Coba untuk melakukan autentikasi dengan kredensial yang sudah divalidasi
        if (Auth::attempt($credentials)) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // Arahkan ke dashboard jika berhasil
            return redirect()->intended('/dashboard');
        }

        // 3. Jika gagal, kembali ke login dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
