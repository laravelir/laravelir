@extends('site.layouts.master')

@section('content')
<div class="col-lg-9">
    <div class="card card-lg">
      <div class="card-body">
        <div class="markdown">
          <div>
            <div class="d-flex mb-3">
              <h1 class="m-0">Changelog</h1>
            </div>
          </div>
          <div class="mb-4">
            <div class="mb-2">
              <span class="badge bg-blue-lt">1.0.0-beta8</span> –
              <span class="text-muted">February 05, 2021</span>
            </div>
            <ul>
              <li>update dependencies</li>
              <li>new vector maps demos</li>
              <li>fixes update map on resize</li>
              <li>docs improvement</li>
              <li>replace <code class="language-plaintext highlighter-rouge">badge</code> with <code class="language-plaintext highlighter-rouge">status-dot</code> in <code class="language-plaintext highlighter-rouge">navbar-notifications.html</code></li>
              <li>map tooltip fixes</li>
            </ul>
          </div>
          <div class="mb-4">
            <div class="mb-2">
              <span class="badge bg-blue-lt">1.0.0-beta7</span> –
              <span class="text-muted">February 05, 2021</span>
            </div>
            <ul>
              <li>fix: <a href="https://github.com/tabler/tabler/issues/1019" target="_blank" rel="noopener">#1019</a> - project-overview.html link not working</li>
              <li>fix: <a href="https://github.com/tabler/tabler/issues/1010" target="_blank" rel="noopener">#1010</a> - card with bottom tabs has incorrect border radius</li>
              <li>uptime monitor mobile fixes</li>
              <li>navbar dark button fix</li>
              <li><code class="language-plaintext highlighter-rouge">tabler-icons</code> link</li>
              <li>autoloading webfonts</li>
              <li>cards fixes, new cards demos</li>
              <li>ruby dependencies update</li>
              <li>RTL stylesheet fixes</li>
              <li>new card action demos</li>
            </ul>
          </div>
          <div class="mb-4">
            <div class="mb-2">
              <span class="badge bg-blue-lt">1.0.0-beta6</span> –
              <span class="text-muted">January 18, 2021</span>
            </div>
            <ul>
              <li>pricing cards fix</li>
              <li>fix bug <code class="language-plaintext highlighter-rouge">fw-...</code>, <code class="language-plaintext highlighter-rouge">.fs-...</code> is missed (<a href="https://github.com/tabler/tabler/issues/987" target="_blank" rel="noopener">#987</a>)</li>
              <li>avatar class fix</li>
              <li>fix bug <a href="https://github.com/tabler/tabler/issues/903" target="_blank" rel="noopener">#903</a> <code class="language-plaintext highlighter-rouge">litepicker</code> with date range not having correct border</li>
              <li>page wrapper fix</li>
              <li>fix <a href="https://github.com/tabler/tabler/issues/900" target="_blank" rel="noopener">#900</a> <code class="language-plaintext highlighter-rouge">is-invalid-lite</code> class is not working under <code class="language-plaintext highlighter-rouge">was-validated</code> form class</li>
              <li>update <code class="language-plaintext highlighter-rouge">@tabler/icons</code> to version 1.48</li>
              <li>fix <a href="https://github.com/tabler/tabler/issues/960" target="_blank" rel="noopener">#960</a> - Badges not honoring font sizes</li>
              <li>fix <a href="https://github.com/tabler/tabler/issues/959" target="_blank" rel="noopener">#959</a> - <code class="language-plaintext highlighter-rouge">node-sass</code> does not properly compile nested media queries</li>
              <li>update package dependencies to newest version</li>
            </ul>
          </div>
          <div class="mb-4">
            <div class="mb-2">
              <span class="badge bg-blue-lt">1.0.0-beta5</span> –
              <span class="text-muted">December 07, 2021</span>
            </div>
            <p class="strong">Tabler has finally lived to see dark mode! 🌝🌚</p>
            <ul>
              <li><strong>Dark mode enabled!</strong></li>
              <li>add more cursors (<a href="https://github.com/tabler/tabler/issues/947" target="_blank" rel="noopener">#947</a>)</li>
              <li>fix <a href="https://github.com/tabler/tabler/issues/892" target="_blank" rel="noopener">#892</a> - Media queries need to be nested when negating</li>
              <li>update <code class="language-plaintext highlighter-rouge">@tabler/icons</code> to newest version</li>
              <li>move optional dependencies to peerDependencies (<a href="https://github.com/tabler/tabler/issues/924" target="_blank" rel="noopener">#924</a>)</li>
              <li>move deployment to Github Actions (<a href="https://github.com/tabler/tabler/issues/934" target="_blank" rel="noopener">#934</a>)</li>
              <li>table border fixes</li>
              <li>antialiased fix</li>
              <li>update <code class="language-plaintext highlighter-rouge">@tabler/icons</code> to version 1.42</li>
              <li>change default font to ‘Inter’</li>
              <li>colors unify</li>
              <li>add <code class="language-plaintext highlighter-rouge">tom-select</code> and remove <code class="language-plaintext highlighter-rouge">choices.js</code></li>
            </ul>
          </div>
          <div class="mb-4">
            <div class="mb-2">
              <span class="badge bg-blue-lt">1.0.0-beta4</span> –
              <span class="text-muted">October 24, 2021</span>
            </div>
            <ul>
              <li>upgrade required node.js version to 14</li>
              <li>upgrade Bootstrap to 5.1</li>
              <li>upgrade dependencies</li>
              <li>fix <a href="https://github.com/tabler/tabler/issues/775" target="_blank" rel="noopener">#775</a>  litepicker not initializing</li>
              <li>fix <code class="language-plaintext highlighter-rouge">nouislider</code> import in dev</li>
            </ul>
          </div>
          <div class="mb-4">
            <div class="mb-2">
              <span class="badge bg-blue-lt">1.0.0-beta3</span> –
              <span class="text-muted">May 08, 2021</span>
            </div>
            <ul>
              <li>upgrade Bootstrap to 5.0</li>
              <li>upgrade dependencies</li>
              <li>change <code class="language-plaintext highlighter-rouge">$border-radius-pill</code> variable</li>
              <li>badge vertical align fix</li>
            </ul>
          </div>
          <div class="mb-4">
            <div class="mb-2">
              <span class="badge bg-blue-lt">1.0.0-beta2</span> –
              <span class="text-muted">March 29, 2021</span>
            </div>
            <ul>
              <li>update dependencies</li>
              <li><code class="language-plaintext highlighter-rouge">li</code> marker fix</li>
              <li>page wrapper, nav fixes</li>
              <li>scripts optimize, remove <code class="language-plaintext highlighter-rouge">capture_once</code></li>
              <li><code class="language-plaintext highlighter-rouge">page-body</code> fixes</li>
              <li>layout navbar fix</li>
              <li>typography fix</li>
              <li>ribbon fix</li>
              <li>charts label fixes</li>
              <li>charts docs</li>
            </ul>
          </div>
          <div class="mb-4">
            <div class="mb-2">
              <span class="badge bg-blue-lt">1.0.0-beta</span> –
              <span class="text-muted">February 17, 2021</span>
            </div>
            <p class="strong">Initial beta release of Tabler v1.0! Lots more coming soon though 😁</p>
            <ul>
              <li>update Bootstrap to 5.0.0-beta2</li>
              <li>update other dependencies.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
