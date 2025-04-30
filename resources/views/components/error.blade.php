@if (session('error'))
    <div style="position: absolute; right:0;" id="error-message" class="p-3  text-center mb-4 bg-red-500 text-white opacity-0 transition-opacity duration-500">
        {{ session('error') }}
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let errorMessage = document.getElementById('error-message');
            
            if (errorMessage) {
                // Fade in
                setTimeout(() => {
                    errorMessage.classList.remove('opacity-0');
                    errorMessage.classList.add('opacity-100');
                }, 100); 

                // Fade out after 5 seconds
                setTimeout(() => {
                    errorMessage.classList.remove('opacity-100');
                    errorMessage.classList.add('opacity-0');
                }, 5000); 

                // Remove element from DOM after fade-out
                setTimeout(() => {
                    errorMessage.remove();
                }, 5500);
            }
        });
    </script>
@endif
