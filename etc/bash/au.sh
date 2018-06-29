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
	local ARGS cur

	cur="${COMP_WORDS[COMP_CWORD]}"

	COMPREPLY=()
	ARGS=$(_mim_get_args ${COMP_WORDS[@]:1})
	RESULT=$(mim autocomplete $ARGS)

	if [ "2" = "$RESULT" ]; then
		_filedir
	elif [ "1" != "$RESULT" ]; then
		COMPREPLY=( $(compgen -W "$RESULT" -- "$cur") )
	fi

	# return 0
}

complete -F _mim mim