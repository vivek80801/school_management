#!/usr/bin/env bash

SESSION_NAME="laravel-dev"

tmux has-session -t ${SESSION_NAME} 2>/dev/null
if [ $? != 0 ]; then

    tmux new-session -d -s ${SESSION_NAME} -n docker
    tmux send-keys -t ${SESSION_NAME}:docker \
        "notify-send 'starting docker compose'; ./start.sh" Enter

    tmux new-window -n editor -t ${SESSION_NAME}
    tmux send-keys -t ${SESSION_NAME}:editor "nvim ." Enter

    tmux new-window -n browser -t ${SESSION_NAME}
    tmux send-keys -t ${SESSION_NAME}:browser "lynx -vikeys" Enter

    tmux new-window -n extra -t ${SESSION_NAME}

    tmux new-window -n logs -t ${SESSION_NAME}
    tmux send-keys -t ${SESSION_NAME}:logs "
        notify-send 'waiting for docker';
        until [ \"\$(docker inspect --format='{{.State.Health.Status}}' \$(docker compose ps -q app))\" = 'healthy' ]; do sleep 1; done;
        notify-send 'docker ready';
        exit;
        " Enter
fi

tmux attach -t ${SESSION_NAME}
