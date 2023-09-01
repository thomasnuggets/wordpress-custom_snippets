<?php
add_action('admin_footer', 'remove_min_value_inline_script');

function remove_min_value_inline_script() {
    echo '<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.addedNodes.length) {
                        mutation.addedNodes.forEach(function(node) {
                            if (node.querySelectorAll) {
                                node.querySelectorAll("input[min=\'0\']").forEach(function(input) {
                                    input.removeAttribute("min");
                                });
                            }
                        });
                    }
                });
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        });
    </script>';
}
