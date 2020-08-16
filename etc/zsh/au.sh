compdef mim

_mim_get_args(){
    local RESULT

    if [ $# -eq 0 ]; then
        echo "-"
    else
        for ARG in "$@"; do
            RESULT="$RESULT $ARG"
        done

        echo "$RESULT"
    fi
}

_mim() {
	local state ARGS RESULT REST

	ARGS=$(_mim_get_args ${words[@]:1})
	RESULT=$(mim autocomplete$ARGS)

	if [ "2" = "$RESULT" ]; then
		_files
	elif [ "1" != "$RESULT" ]; then
		REST=(`echo ${RESULT}`)
		compadd "$REST[@]"
	fi
}
 
_mim "$@"