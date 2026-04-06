<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, string $role)
    {
        if (! Auth::check() || ! Auth::user()->hasRole($role)) {
            Notification::make()
                ->title('Access Denied')
                ->body('You do not have the required permissions to access this panel.')
                ->danger()
                ->send();

            // Log the user out to clear the session (optional but safer)
            Auth::logout();

            // Invalidate session
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('filament.admin.auth.login')
                ->with('error', 'You do not have the required permissions to access this panel.');
        }

        return $next($request);
    }
}
