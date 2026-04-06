import { watchEffect } from 'vue';

export function useSeo(title, description, image = '/default-share-image.jpg') {
    watchEffect(() => {
        // Update Document Title
        document.title = title ? `${title} | NSUK Department of Computer Science` : 'NSUK Department of Computer Science';

        // Update Meta Tags
        const setMetaTag = (attribute, value, content) => {
            let meta = document.querySelector(`meta[${attribute}="${value}"]`);
            if (!meta) {
                meta = document.createElement('meta');
                meta.setAttribute(attribute, value);
                document.head.appendChild(meta);
            }
            meta.setAttribute('content', content);
        };

        // Standard Meta
        setMetaTag('name', 'description', description || 'Welcome to the Nasarawa State University Keffi (NSUK) Department of Computer Science. Dedicated to excellence in teaching, research, and service.');

        // Open Graph Meta
        setMetaTag('property', 'og:title', title || 'NSUK Department of Computer Science');
        setMetaTag('property', 'og:description', description || 'Welcome to the Nasarawa State University Keffi (NSUK) Department of Computer Science. Dedicated to excellence in teaching, research, and service.');
        setMetaTag('property', 'og:image', window.location.origin + image);
        setMetaTag('property', 'og:type', 'website');
        setMetaTag('property', 'og:url', window.location.href);

        // Twitter Card Meta
        setMetaTag('name', 'twitter:card', 'summary_large_image');
        setMetaTag('name', 'twitter:title', title || 'NSUK Department of Computer Science');
        setMetaTag('name', 'twitter:description', description || 'Welcome to the Nasarawa State University Keffi (NSUK) Department of Computer Science. Dedicated to excellence in teaching, research, and service.');
        setMetaTag('name', 'twitter:image', window.location.origin + image);
    });
}