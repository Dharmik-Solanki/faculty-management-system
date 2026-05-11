<x-app-layout>
    <div style="padding-top: 48px; padding-bottom: 48px; font-family: system-ui, -apple-system, sans-serif; background-color: #f9fafb; min-height: calc(100vh - 65px);">
        <div style="max-width: 1280px; margin-left: auto; margin-right: auto; padding-left: 24px; padding-right: 24px;">
            <div style="background-color: #ffffff; overflow: hidden; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); border-radius: 8px; padding: 24px; font-size: 20px; color: #374151; border: 1px solid #e5e7eb;">
                Hello, <strong style="color: #1f2937;">{{ auth()->user()->name }}</strong>! Welcome to the Faculty Portal.
            </div>
        </div>
    </div>
</x-app-layout>
