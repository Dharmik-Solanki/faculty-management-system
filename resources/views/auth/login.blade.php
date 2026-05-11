<x-guest-layout>
    <x-auth-session-status style="margin-bottom: 16px;" :status="session('status')" />

    <div style="padding: 16px; font-family: system-ui, -apple-system, sans-serif;">
        <h2 style="font-size: 24px; font-weight: bold; text-align: center; color: #1f2937; margin-top: 0; margin-bottom: 24px;">
            Welcome to Faculty Login
        </h2>

        <form method="POST" action="{{ route('login') }}" style="margin: 0;">
            @csrf

            <div style="margin-bottom: 16px;">
                <label for="email" style="display: block; font-weight: 500; font-size: 14px; color: #374151; margin-bottom: 4px;">
                    Email Address
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                       style="box-sizing: border-box; display: block; width: 100%; border: 1px solid #d1d5db; border-radius: 6px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); padding: 8px; outline: none; transition: border-color 0.2s, box-shadow 0.2s;"
                       onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 1px #3b82f6';"
                       onblur="this.style.borderColor='#d1d5db'; this.style.boxShadow='0 1px 2px rgba(0, 0, 0, 0.05)';">
                <x-input-error :messages="$errors->get('email')" style="margin-top: 8px; color: #dc2626; font-size: 14px; list-style-type: none; padding: 0;" />
            </div>

            <div style="margin-bottom: 24px;">
                <label for="password" style="display: block; font-weight: 500; font-size: 14px; color: #374151; margin-bottom: 4px;">
                    Password
                </label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       style="box-sizing: border-box; display: block; width: 100%; border: 1px solid #d1d5db; border-radius: 6px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); padding: 8px; outline: none; transition: border-color 0.2s, box-shadow 0.2s;"
                       onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 1px #3b82f6';"
                       onblur="this.style.borderColor='#d1d5db'; this.style.boxShadow='0 1px 2px rgba(0, 0, 0, 0.05)';">
                <x-input-error :messages="$errors->get('password')" style="margin-top: 8px; color: #dc2626; font-size: 14px; list-style-type: none; padding: 0;" />
            </div>

            <button type="submit"
                    style="box-sizing: border-box; width: 100%; background-color: #2563eb; color: #ffffff; font-weight: bold; padding: 12px 16px; border-radius: 6px; border: none; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); cursor: pointer; transition: background-color 0.2s;"
                    onmouseover="this.style.backgroundColor='#1d4ed8'"
                    onmouseout="this.style.backgroundColor='#2563eb'">
                Log in
            </button>

            <div style="margin-top: 24px; display: flex; justify-content: flex-end;">
                <a href="{{ route('register') }}"
                   style="font-size: 14px; font-weight: 600; color: #2563eb; text-decoration: none; display: flex; align-items: center; gap: 4px;"
                   onmouseover="this.style.color='#1e40af'; this.style.textDecoration='underline';"
                   onmouseout="this.style.color='#2563eb'; this.style.textDecoration='none';">
                    Click here to register
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
