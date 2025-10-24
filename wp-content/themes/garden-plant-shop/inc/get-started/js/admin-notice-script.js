
// Creta Testimonial Showcase plugin activation
document.addEventListener('DOMContentLoaded', function () {
    const garden_plant_shop_button = document.getElementById('install-activate-button');

    if (!garden_plant_shop_button) return;

    garden_plant_shop_button.addEventListener('click', function (e) {
        e.preventDefault();

        const garden_plant_shop_redirectUrl = garden_plant_shop_button.getAttribute('data-redirect');

        // Step 1: Check if plugin is already active
        const garden_plant_shop_checkData = new FormData();
        garden_plant_shop_checkData.append('action', 'check_creta_testimonial_activation');

        fetch(installcretatestimonialData.ajaxurl, {
            method: 'POST',
            body: garden_plant_shop_checkData,
        })
        .then(res => res.json())
        .then(res => {
            if (res.success && res.data.active) {
                // Plugin is already active → just redirect
                window.location.href = garden_plant_shop_redirectUrl;
            } else {
                // Not active → proceed with install + activate
                garden_plant_shop_button.textContent = 'Nevigate Getstart';

                const garden_plant_shop_installData = new FormData();
                garden_plant_shop_installData.append('action', 'install_and_activate_creta_testimonial_plugin');
                garden_plant_shop_installData.append('_ajax_nonce', installcretatestimonialData.nonce);

                fetch(installcretatestimonialData.ajaxurl, {
                    method: 'POST',
                    body: garden_plant_shop_installData,
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        window.location.href = garden_plant_shop_redirectUrl;
                    } else {
                        alert('Activation error: ' + (res.data?.message || 'Unknown error'));
                        garden_plant_shop_button.textContent = 'Try Again';
                    }
                })
                .catch(error => {
                    alert('Request failed: ' + error.message);
                    garden_plant_shop_button.textContent = 'Try Again';
                });
            }
        })
        .catch(error => {
            alert('Check request failed: ' + error.message);
        });
    });
});
