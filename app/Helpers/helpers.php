<?php

function state($state) {
	if ($state==0) {
		return '<span class="badge badge-danger">Inactivo</span>';
	} elseif ($state==1) {
		return '<span class="badge badge-success">Activo</span>';
	} else {
		return '<span class="badge badge-dark">Desconocido</span>';
	}
}

function stateNew($state) {
	if ($state==0) {
		return '<span class="badge badge-primary">Publicado</span>';
	} elseif ($state==1) {
		return '<span class="badge badge-info">Borrador</span>';
	} else {
		return '<span class="badge badge-dark">Desconocido</span>';
	}
}

function typeUser($type, $badge=1) {
	if ($badge==1) {
		if ($type==1) {
			return '<span class="badge badge-primary">Super Admin</span>';
		} else {
			return '<span class="badge badge-dark">Desconocido</span>';
		}
	} elseif ($badge==0) {
		if ($type==1) {
			return 'Super Admin';
		} else {
			return 'Desconocido';
		}
	}
}

function active($path, $group=null) {
	if (is_array($path)) {
		foreach ($path as $url) {
			if (is_null($group)) {
				if (request()->is($url)) {
					return 'active';
				}
			} else {
				if (is_int(strpos(request()->path(), $url))) {
					return 'active';
				}
			}
		}
		return '';
	} else {
		if (is_null($group)) {
			return request()->is($path) ? 'active' : '';
		} else {
			return is_int(strpos(request()->path(), $path)) ? 'active' : '';
		}
	}
}

function menu_expanded($path, $group=null) {
	if (is_array($path)) {
		foreach ($path as $url) {
			if (is_null($group)) {
				if (request()->is($url)) {
					return 'true';
				}
			} else {
				if (is_int(strpos(request()->path(), $url))) {
					return 'true';
				}
			}
		}
		return 'false';
	} else {
		if (is_null($group)) {
			return request()->is($path) ? 'true' : 'false';
		} else {
			return is_int(strpos(request()->path(), $path)) ? 'true' : 'false';
		}
	}
}

function submenu($path, $action=null) {
	if (is_array($path)) {
		foreach ($path as $url) {
			if (is_null($action)) {
				if (request()->is($url)) {
					return 'class=active';
				}
			} else {
				if (is_int(strpos(request()->path(), $url))) {
					return 'show';
				}
			}
		}
		return '';
	} else {
		if (is_null($action)) {
			return request()->is($path) ? 'class=active' : '';
		} else {
			return is_int(strpos(request()->path(), $path)) ? 'show' : '';
		}
	}
}

function selectArray($arrays, $selectedItems) {
	$selects="";
	foreach ($arrays as $array) {
		$select="";
		if (count($selectedItems)>0) {
			foreach ($selectedItems as $selected) {
				if ($selected->slug==$array->slug) {
					$select="selected";
					break;
				} else {
					$select="";
				}
			}
		}
		$selects.='<option value="'.$array->slug.'" '.$select.'>'.$array->name.'</option>';
	}
	return $selects;
}

function lang($lang) {
	if ($lang=='es') {
		return '<span class="badge badge-danger">Español</span>';
	} elseif ($lang=='en') {
		return '<span class="badge badge-info">Inglés</span>';
	} else {
		return '<span class="badge badge-dark">Desconocido</span>';
	}
}

function reservation($reservation) {
	if ($reservation=='1') {
		return '<span class="badge badge-success">Reservas</span>';
	} elseif ($reservation=='2') {
		return '<span class="badge badge-default">Cancelación</span>';
	} else {
		return '<span class="badge badge-dark">Desconocido</span>';
	}
}