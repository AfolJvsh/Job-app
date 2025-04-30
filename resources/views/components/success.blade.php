@if (session('success'))
    <div style="position: absolute; right:0;" id="flash-message" class="p-3 rounded-md text-center mb-4 bg-green-500 text-white opacity-0 transition-opacity duration-500">
        {{ session('success') }}
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let flashMessage = document.getElementById('flash-message');
            
            if (flashMessage) {
                // Fade in
                setTimeout(() => {
                    flashMessage.classList.remove('opacity-0');
                    flashMessage.classList.add('opacity-100');
                }, 100); 

                // Fade out after 5 seconds
                setTimeout(() => {
                    flashMessage.classList.remove('opacity-100');
                    flashMessage.classList.add('opacity-0');
                }, 5000); 

                // Remove element from DOM after fade-out
                setTimeout(() => {
                    flashMessage.remove();
                }, 5500);
            }
        });
    </script>
@endif
