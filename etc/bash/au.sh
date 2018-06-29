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

_mim(){
	local ARGS CURRENT LE_FILE

	COMPREPLY=()
	CURRENT="${COMP_WORDS[COMP_CWORD]}"
	ARGS=$(_mim_get_args ${COMP_WORDS[@]:1})
	RESULT=$(mim autocomplete $ARGS)

	if [ "1" != "$RESULT" ]; then
		COMPREPLY=( $(compgen -W "$RESULT" -- ${CURRENT}) )
	fi

	return 0
}

complete -F _mim mim