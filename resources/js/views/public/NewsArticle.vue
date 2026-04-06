<template>
  <div class="bg-gray-50 min-h-screen pb-20">
    <!-- Header / Hero for Article -->
    <div class="bg-primary pt-24 pb-32 text-white">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <div class="badge badge-secondary badge-outline mb-4">Department News</div>
        <h1 class="text-4xl md:text-5xl font-serif font-bold mb-6">Tech Symposium 2026 Scheduled</h1>
        <div class="flex items-center justify-center space-x-4 text-sm font-light opacity-80">
          <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> April 6, 2026</span>
          <span>•</span>
          <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> IT Admin</span>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 z-10 relative">
      <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <img src="https://picsum.photos/1200/600?random=1" alt="Article Image" class="w-full h-80 object-cover" />
        
        <div class="p-8 md:p-12">
          <!-- Article Body -->
          <article class="prose max-w-none prose-lg text-gray-700 font-sans mb-12">
            <p>Join us for the annual technology symposium featuring guest speakers from top tech companies across the globe. Register now to secure your spot. This year we focus on Artificial Intelligence and its integration into academic routines and regional implementations.</p>
            <p>The Department of Computer Science at NSUK has consistently broken grounds, and this year's symposium will mark another milestone in bridging the gap between student theories and practical tech industry innovations.</p>
          </article>

          <!-- Guest Reactions -->
          <div class="border-t border-gray-100 pt-8 mb-12">
            <h3 class="text-xl font-bold text-primary font-serif mb-6">Reactions</h3>
            <div class="flex space-x-4">
              <button @click="react('like')" class="btn btn-outline btn-primary shadow-sm hover:scale-105 transition-transform" :class="{'bg-primary text-white': userReaction === 'like'}">
                👍 {{ reactions.like }}
              </button>
              <button @click="react('love')" class="btn btn-outline border-pink-500 text-pink-500 hover:bg-pink-500 hover:border-pink-500 shadow-sm hover:scale-105 transition-transform" :class="{'bg-pink-500 text-white': userReaction === 'love'}">
                ❤️ {{ reactions.love }}
              </button>
              <button @click="react('insightful')" class="btn btn-outline border-blue-500 text-blue-500 hover:bg-blue-500 hover:border-blue-500 shadow-sm hover:scale-105 transition-transform" :class="{'bg-blue-500 text-white': userReaction === 'insightful'}">
                💡 {{ reactions.insightful }}
              </button>
            </div>
          </div>

          <!-- Comments Section -->
          <div class="border-t border-gray-100 pt-8">
            <h3 class="text-2xl font-bold text-gray-800 font-serif mb-6">Comments (<span class="text-primary">{{ comments.length }}</span>)</h3>
            
            <!-- Comment Form -->
            <form @submit.prevent="submitComment" class="mb-10 bg-gray-50 p-6 rounded-xl border border-gray-200">
              <h4 class="font-bold text-gray-700 mb-4">Leave a Comment</h4>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div class="form-control">
                  <input type="text" v-model="newComment.name" placeholder="Your Name *" required class="input input-bordered w-full bg-white" />
                </div>
                <div class="form-control">
                  <input type="email" v-model="newComment.email" placeholder="Your Email (Optional)" class="input input-bordered w-full bg-white" />
                </div>
              </div>
              <div class="form-control mb-4">
                <textarea v-model="newComment.body" placeholder="Write your comment here... *" required class="textarea textarea-bordered h-24 bg-white"></textarea>
              </div>
              <button type="submit" class="btn btn-primary" :disabled="submitting">
                <span v-if="submitting" class="loading loading-spinner loading-sm"></span>
                Post Comment
              </button>
            </form>

            <!-- Comments List -->
            <div class="space-y-6">
              <div v-for="comment in comments" :key="comment.id" class="flex space-x-4 p-4 hover:bg-gray-50 rounded-lg transition-colors">
                <div class="avatar placeholder">
                  <div class="bg-gray-200 text-gray-600 rounded-full w-12 h-12">
                    <span class="text-lg uppercase font-bold">{{ comment.name.charAt(0) }}</span>
                  </div>
                </div>
                <div class="flex-1">
                  <div class="flex justify-between items-center mb-1">
                    <h5 class="font-bold text-gray-800">{{ comment.name }}</h5>
                    <span class="text-xs text-gray-500">{{ comment.date }}</span>
                  </div>
                  <p class="text-gray-600 text-sm leading-relaxed">{{ comment.body }}</p>
                </div>
              </div>
              
              <div v-if="comments.length === 0" class="text-center py-8 text-gray-500 italic">
                No comments yet. Be the first to share your thoughts!
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const reactions = ref({
    like: 24,
    love: 12,
    insightful: 8
});
const userReaction = ref(null);

const comments = ref([
    {
        id: 1,
        name: "Ahmad Musa",
        date: "April 6, 2026",
        body: "I'm really looking forward to this symposium! The focus on AI is exactly what we need right now to align with global trends."
    },
    {
        id: 2,
        name: "Grace E.",
        date: "April 6, 2026",
        body: "Will there be remote participation available? Some of our alumni would love to join in."
    }
]);

const newComment = ref({
    name: '',
    email: '',
    body: ''
});
const submitting = ref(false);

const react = (type) => {
    // Basic toggle logic for demonstration
    if (userReaction.value === type) {
        reactions.value[type]--;
        userReaction.value = null;
    } else {
        if (userReaction.value) {
            reactions.value[userReaction.value]--; // remove old
        }
        reactions.value[type]++;
        userReaction.value = type;
    }
};

const submitComment = () => {
    submitting.value = true;
    setTimeout(() => {
        comments.value.unshift({
            id: Date.now(),
            name: newComment.value.name,
            date: "Just now",
            body: newComment.value.body
        });
        newComment.value.name = '';
        newComment.value.email = '';
        newComment.value.body = '';
        submitting.value = false;
        
        window.Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: 'Comment posted successfully!',
            showConfirmButton: false,
            timer: 3000
        });
    }, 800);
};
</script>