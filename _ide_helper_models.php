<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Customer data model.
 *
 * @author Daryl Peterson <@gmail.com>
 * @copyright Copyright (c) 2020, Daryl Peterson
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @since 1.0.0
 * @property string $account
 * @property string $agreement
 * @property string $username
 * @property string $password
 * @property string $firstname
 * @property string $lastname
 * @property string $company
 * @property string $email
 * @property string $phone
 * @property string $mobile
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property int    $gpslat
 * @property int    $gpslong
 * @property string $comment
 * @property int $svc_type
 * @property int $svc_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $first_name
 * @property string $last_name
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAgreement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereGpslat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereGpslong($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereSvcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereSvcType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereZip($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * Nas data model.
 *
 * @author Daryl Peterson <@gmail.com>
 * @copyright Copyright (c) 2020, Daryl Peterson
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @since 1.0.0
 * @property string $nasname     IP Address
 * @property string $shortname   A short alias that can be used in place of the IP address or fully qualified hostname provided in the first line of the section.
 * @property string $type        User access port type
 * @property int    $ports       Identifier of the NAS port that is authenticating the user
 * @property string $secret      The RADIUS shared secret used for communication between the client/NAS and the RADIUS server.
 * @property string $community   SNMP Community
 * @property string $description
 * @property int $id
 * @property string|null $server
 * @method static \Database\Factories\NASFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|NAS nasName(string $name)
 * @method static \Illuminate\Database\Eloquent\Builder|NAS newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NAS newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NAS query()
 * @method static \Illuminate\Database\Eloquent\Builder|NAS whereCommunity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NAS whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NAS whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NAS whereNasname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NAS wherePorts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NAS whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NAS whereServer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NAS whereShortname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NAS whereType($value)
 */
	class NAS extends \Eloquent {}
}

namespace App\Models{
/**
 * RadAcct data model.
 *
 * @author Daryl Peterson <@gmail.com>
 * @copyright Copyright (c) 2020, Daryl Peterson
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @since 1.0.0
 * @property string $acctsessionid
 * @property string $acctuniqueid
 * @property string $username
 * @property string $realm
 * @property string $nasipaddress
 * @property string $nasporttype
 * @property string $acctstarttime
 * @property string $acctupdatetime
 * @property string $acctstoptime
 * @property string $acctinterval
 * @property string $acctsessiontime
 * @property string $acctauthentic
 * @property string $connectinfo_start
 * @property string $connectinfo_stop
 * @property string $acctinputoctets
 * @property string $acctoutputoctets
 * @property string $calledstationid
 * @property string $callingstationid
 * @property string $acctterminatecause
 * @property string $servicetype
 * @property string $framedprotocol
 * @property string $framedipaddress
 * @property string $framedipv6address
 * @property string $framedipv6prefix
 * @property string $framedinterfaceid
 * @property string $delegatedipv6prefix
 * @property string $class
 * @property int $radacctid
 * @property string|null $nasportid
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct logSearch(?string $username = null, ?string $sdate = null, ?string $edate = null, ?string $nas = null)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct nasIpAddress(?string $nas = null)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct query()
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct startDate(?string $date = null)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct stopDate(?string $date = null)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct userName(?string $username = null)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereAcctauthentic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereAcctinputoctets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereAcctinterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereAcctoutputoctets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereAcctsessionid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereAcctsessiontime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereAcctstarttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereAcctstoptime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereAcctterminatecause($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereAcctuniqueid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereAcctupdatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereCalledstationid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereCallingstationid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereConnectinfoStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereConnectinfoStop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereDelegatedipv6prefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereFramedinterfaceid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereFramedipaddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereFramedipv6address($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereFramedipv6prefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereFramedprotocol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereNasipaddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereNasportid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereNasporttype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereRadacctid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereRealm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereServicetype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadAcct whereUsername($value)
 */
	class RadAcct extends \Eloquent {}
}

namespace App\Models{
/**
 * Radcheck data model.
 *
 * @author Daryl Peterson <@gmail.com>
 * @copyright Copyright (c) 2020, Daryl Peterson
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @since 1.0.0
 * @property string $username
 * @property string $attribute
 * @property string $op
 * @property string $value
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder|RadCheck exist(string $username)
 * @method static \Illuminate\Database\Eloquent\Builder|RadCheck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadCheck newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadCheck query()
 * @method static \Illuminate\Database\Eloquent\Builder|RadCheck userName(string $name)
 * @method static \Illuminate\Database\Eloquent\Builder|RadCheck whereAttribute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadCheck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadCheck whereOp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadCheck whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadCheck whereValue($value)
 */
	class RadCheck extends \Eloquent {}
}

namespace App\Models{
/**
 * RadGroupCheck data model.
 *
 * @author Daryl Peterson <@gmail.com>
 * @copyright Copyright (c) 2020, Daryl Peterson
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @since 1.0.0
 * @property string $groupname
 * @property string $attribute
 * @property string $op
 * @property string $value
 * @property int $id
 * @property-read \App\Models\Service|null $service
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupCheck groupName(string $name)
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupCheck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupCheck newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupCheck query()
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupCheck whereAttribute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupCheck whereGroupname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupCheck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupCheck whereOp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupCheck whereValue($value)
 */
	class RadGroupCheck extends \Eloquent {}
}

namespace App\Models{
/**
 * RadGroupReply data model.
 *
 * @author Daryl Peterson <@gmail.com>
 * @copyright Copyright (c) 2020, Daryl Peterson
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @since 1.0.0
 * @property string $groupname
 * @property string $attribute
 * @property string $op
 * @property string $value
 * @property int $id
 * @property-read \App\Models\Service|null $service
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupReply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupReply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupReply query()
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupReply whereAttribute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupReply whereGroupname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupReply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupReply whereOp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadGroupReply whereValue($value)
 */
	class RadGroupReply extends \Eloquent {}
}

namespace App\Models{
/**
 * RadPostAuth data model.
 *
 * @author Daryl Peterson <@gmail.com>
 * @copyright Copyright (c) 2020, Daryl Peterson
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @since 1.0.0
 * @property string $username
 * @property string $pass
 * @property string $reply
 * @property string $authdate
 * @property string $class
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder|RadPostAuth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadPostAuth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadPostAuth query()
 * @method static \Illuminate\Database\Eloquent\Builder|RadPostAuth whereAuthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadPostAuth whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadPostAuth whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadPostAuth wherePass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadPostAuth whereReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadPostAuth whereUsername($value)
 */
	class RadPostAuth extends \Eloquent {}
}

namespace App\Models{
/**
 * RadReply data model.
 *
 * @author Daryl Peterson <@gmail.com>
 * @copyright Copyright (c) 2020, Daryl Peterson
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @since 1.0.0
 * @property string $username
 * @property string $attribute
 * @property string $op
 * @property string $value
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder|RadReply exist(string $username)
 * @method static \Illuminate\Database\Eloquent\Builder|RadReply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadReply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadReply query()
 * @method static \Illuminate\Database\Eloquent\Builder|RadReply whereAttribute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadReply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadReply whereOp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadReply whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadReply whereValue($value)
 */
	class RadReply extends \Eloquent {}
}

namespace App\Models{
/**
 * RadUserGroup data model.
 *
 * @author Daryl Peterson <@gmail.com>
 * @copyright Copyright (c) 2020, Daryl Peterson
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @since 1.0.0
 * @property string $userName
 * @property string $groupName
 * @property int    $priority
 * @property int $id
 * @property string $username
 * @property string $groupname
 * @method static \Illuminate\Database\Eloquent\Builder|RadUserGroup group(string $groupName)
 * @method static \Illuminate\Database\Eloquent\Builder|RadUserGroup groupExist(string $groupName)
 * @method static \Illuminate\Database\Eloquent\Builder|RadUserGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadUserGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RadUserGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|RadUserGroup user(string $userName)
 * @method static \Illuminate\Database\Eloquent\Builder|RadUserGroup userExist(string $userName)
 * @method static \Illuminate\Database\Eloquent\Builder|RadUserGroup whereGroupname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadUserGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadUserGroup wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RadUserGroup whereUsername($value)
 */
	class RadUserGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * Service data table.
 *
 * @author Daryl Peterson <@gmail.com>
 * @copyright Copyright (c) 2020, Daryl Peterson
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @since 1.0.0
 * @property string $name
 * @property int $id
 * @property int $type_id
 * @property string|null $code Billing Code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RadGroupCheck> $check
 * @property-read int|null $check_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RadGroupReply> $reply
 * @property-read int|null $reply_count
 * @property-read \App\Models\ServiceType $type
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * Class description.
 *
 * @category 
 * @author Daryl Peterson <@gmail.com>
 * @copyright Copyright (c) 2020, Daryl Peterson
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @since 1.0.0
 * @property string $name
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Customer> $customer
 * @property-read int|null $customer_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $service
 * @property-read int|null $service_count
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceType whereUpdatedAt($value)
 */
	class ServiceType extends \Eloquent {}
}

namespace App\Models{
/**
 * User data model.
 *
 * @category 
 * @author Daryl Peterson <@gmail.com>
 * @copyright Copyright (c) 2020, Daryl Peterson
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @since 1.0.0
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

